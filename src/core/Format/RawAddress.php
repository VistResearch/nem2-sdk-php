<?php

namespace NEM\Core\Format;

use NEM\Core\Format\Base32 as Base32;
use NEM\Core\Format\Convert as Convert;

use kornrunner\Keccak as Keccak;

// Warning : isValidAddress() in not implemented yet.

class RawAddress {
    const constants = [
        "sizes" => [
            "ripemd160"=> 20,
            "addressDecoded"=> 25,
            "addressEncoded"=> 40,
            "key"=> 32,
            "checksum"=> 4,
        ],
    ];
    /**
     * Converts an encoded address string to a decoded address.
     * @param {string} encoded The encoded address string.
     * @returns {Uint8Array} The decoded address corresponding to the input.
     */
    static function stringToAddress(string $encoded): Array{
        if (RawAddress::constants["sizes"]["addressEncoded"] !== strlen($encoded)) {
            throw Error(`${encoded} does not represent a valid encoded address`);
        }

        return Base32::Base32Decode($encoded);
    }

    /**
     * Format a namespaceId *alias* into a valid recipient field value.
     * @param {Uint8Array} namespaceId The namespaceId
     * @returns {Uint8Array} The padded notation of the alias
     */
    static function aliasToRecipient(Array $namespaceId): Array{
        // 0x91 | namespaceId on 8 bytes | 16 bytes 0-pad = 25 bytes
        $padded = [];
        $padded[0] = 0x91;
        $padded = array_merge($padded, array_reverse ($namespaceId));
        array_push($padded, Convert::hexToUint8(str_repeat ('00',16)));
        return $padded;
    }

    /**
     * Converts a decoded address to an encoded address string.
     * @param {Uint8Array} decoded The decoded address.
     * @returns {string} The encoded address string corresponding to the input.
     */
    static function addressToString(Array $decoded): string{
        if (RawAddress::constants["sizes"]["addressDecoded"] !== sizeof($decoded)) {
            throw Error(`${Convert::uint8ToHex($decoded)} does not represent a valid decoded address`);
        }

        return Base32::Base32Encode($decoded);
    }

    /**
     * Converts a public key to a decoded address for a specific network.
     * @param {Uint8Array} publicKey The public key.
     * @param {number} networkIdentifier The network identifier.
     * @param {SignSchema} signSchema The Sign Schema. (KECCAK_REVERSED_KEY / SHA3)
     * @returns {string} The decoded address corresponding to the inputs.
     */
    static function publicKeyToAddress(string $publicKey,
                                        $networkIdentifier,
                                        string $signSchema = "SHA3"): String{

        $byteAddress = array(25);
        $byteAddress[0] = $networkIdentifier;

        // step 1: sha3 hash of the public key
        $publicKeyHash = $signSchema === "SHA3" ? hash("sha3-256",hex2bin($publicKey)) : Keccak::hash(hex2bin($publicKey), 256);

        // step 2: ripemd160 hash of (1)
        $ripemd_160bit = hash("ripemd160",hex2bin($publicKeyHash));

        // step 3: add network identifier byte in front of (2)
        $bt = unpack('C*', hex2bin($ripemd_160bit));
        $byteAddress += $bt;
        $checksumTarget = call_user_func_array("pack", array_merge(array("C21"), $byteAddress));

        // step 4: concatenate (3) and the checksum of (3)
        $hash = $signSchema === "SHA3" ? hex2bin(hash("sha3-256",$checksumTarget)) : hex2bin(Keccak::hash($checksumTarget, 256));
        $hash = unpack('C*', substr($hash, 0, 4));
        $byteAddress = array_merge($byteAddress,$hash);
        $byteAddress = Base32::Base32Encode($byteAddress);

        return $byteAddress;
    }

    // /**
    //  * Determines the validity of a decoded address.
    //  * @param {Uint8Array} decoded The decoded address.
    //  * @param {SignSchema} signSchema The Sign Schema. (KECCAK_REVERSED_KEY / SHA3)
    //  * @returns {boolean} true if the decoded address is valid, false otherwise.
    //  */
    // static function isValidAddress(Array $decoded, string $signSchema = "SHA3"): boolean{
        

        
    //     $checksumBegin = RawAddress::constants["sizes"]["addressDecoded"] - RawAddress::constants["sizes"]["checksum"];

    //     $hash = $signSchema === "SHA3" ? hash("sha3-256",hex2bin($hashStr)) : Keccak::hash(hex2bin($hashStr), 256);

    //     $decoded = array_slice($decoded,$checksumBegin);
    //     $hashStr = pack("C*", ...$decoded);

    //     const checksum = new Uint8Array(RawAddress.constants.sizes.checksum);
        
    //     RawArray.copy(checksum, RawArray.uint8View(hash.arrayBuffer()), RawAddress.constants.sizes.checksum);
    //     array_slice($decoded,$checksumBegin)
    //     return RawArray.deepEqual(checksum, decoded.subarray(checksumBegin));
    // }

    /**
     * Determines the validity of an encoded address string.
     * @param {string} encoded The encoded address string.
     * @returns {boolean} true if the encoded address string is valid, false otherwise.
     */
    static function isValidEncodedAddress(string $encoded): boolean{
        if (RawAddress::constants["sizes"]["addressEncoded"] !== strlen($encoded)) {
            return false;
        }

        try {
            $decoded = RawAddress::stringToAddress($encoded);
            return RawAddress::isValidAddress($decoded);
        } catch (Exception $e) {
            return false;
        }
    }
}