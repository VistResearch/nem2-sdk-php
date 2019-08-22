<?php

namespace NEM\Models\Account;

use NEM\Models\Blockchain\NetworkType;
use NEM\util\Base32;
use NEM\Core\Format\Convert;

use NEM\Core\Format\RawAddress as RawAddress;

class Address{


	private $address; //string
	private $networkType; // NetworkType Object
	// contains addr meta and addr


    /**
     * Create from publicKey key
     *  param publicKey - The account public key. ex: b4f12e7c9f6946091e2cb8b6d3a12b50d17ccbbf646386ea27ce2946a7423dcf
     *  param networkType - The NEM network type.
     *  returns {Address}
     */
    static function createFromPublicKey(string $publicKey,$networkType, string $signSchema = "SHA3"): Address{
        return Address::createFromRawAddress(RawAddress::publicKeyToAddress($publicKey,$networkType,$signSchema),$signSchema);
    }

    /**
     * Create an Address from a given raw address.
     *  param rawAddress - Address in string format.
     *                  ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3 or SB3KUB-HATFCP-V7UZQL-WAQ2EU-R6SIHB-SBEOED-DDF3
     *  returns {Address}
     */
    static function createFromRawAddress(string $rawAddress, string $signSchema = "SHA3"): Address{


        $networkType = new NetworkType();

        $addressTrimAndUpperCase = str_replace("-","",$rawAddress);

        $addressTrimAndUpperCase = strtoupper($addressTrimAndUpperCase);



        if (strlen($addressTrimAndUpperCase) !== 40) {
            throw new Error('Address ' . $addressTrimAndUpperCase . ' has to be 40 characters long');
        }

        $rest = substr($addressTrimAndUpperCase, 0,1);
        if ($rest === 'S') {
            $networkType = NetworkType::MIJIN_TEST;
        } else if ($rest === 'M') {
            $networkType = NetworkType::MIJIN;
        } else if ($rest === 'T') {
            $networkType = NetworkType::TEST_NET;
        } else if ($rest === 'N') {
            $networkType = NetworkType::MAIN_NET;
        } else {
            throw new Error('Address Network unsupported');
        }

        return new Address($addressTrimAndUpperCase, $networkType, $signSchema);
    }


    function __construct(string $address, $network, $signSchema) {
        $this->address = $address;
        $this->networkType = $network;
    }

    /**
     * Get networkType as int
     *  returns {int}
     */
    public function networkType(){
        return $this->networkType;
    }

    /**
     * Get address in plain format ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3.
     * @returns {string}
     */
    public function plain():string{
        return $this->address;
    }

    /**
     * Compares addresses for equality
     *  param address - Address
     *  returns {boolean}
     */
    public function equals(Address $address): bool {
        return $this->plain() === $address->plain() && $this->networkType() === $address->networkType();
    }

    /**
     * Create DTO object
     */
    public function toDTO() {
        return ["address" => $this->address,
            "networkType" => $this->networkType];
    }

    static function FromDTO($DTOArray): Address {
        if (!array_key_exists("address",$DTOArray)) {
            throw new Error('Wrong DTO format'."\n");
        }
        
        return Address::createFromRawAddress($DTOArray["address"]);
    }   

    /**
     * Get address in pretty format ex: SB3KUB-HATFCP-V7UZQL-WAQ2EU-R6SIHB-SBEOED-DDF3.
     * @returns {string}
     */
    public function pretty(): string {
        // Get address in pretty format ex: SB3KUB-HATFCP-V7UZQL-WAQ2EU-R6SIHB-SBEOED-DDF3.
        return substr(chunk_split($this->address,6,"-"),0,-1);
    }

} 