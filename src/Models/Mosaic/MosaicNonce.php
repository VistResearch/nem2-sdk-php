<?php

namespace NEM\Models\Mosaic;


use Exception;
class MosaicNonce {

    /**
     * Mosaic nonce
     */
    public $nonce; // Uint8Array;

    /**
     * Create a random MosaicNonce
     *
     * @return  {MosaicNonce}
     */
    public static function createRandom(): MosaicNonce {
        $bytes = random_bytes(4);
        $nonce = unpack("C*", $bytes);
        return new MosaicNonce($nonce);
    }

    /**
     * Create a MosaicNonce from hexadecimal notation.
     *
     * @param   hex     {string}
     * @return  {MosaicNonce}
     */
    public static function createFromHex(string $hex): MosaicNonce {
        $bin = unpack("C*",hex2bin($hex));

        if (sizeof($bin) !== 4) {
            throw new Error('Expected 4 bytes for Nonce and got ' + sizeof($bin) + ' instead.');
        }

        return new MosaicNonce($bin);
    }

    /**
     * Create MosaicNonce from Uint8Array
     *
     * @param id
     */
    function __construct(Array $nonce) {
        if (sizeof($nonce) !== 4) {
            throw Error('Invalid byte size for nonce, should be 4 bytes but received ' . sizeof($nonce));
        }

        $this->nonce = $nonce;
    }

    public function toDTO(){
        return $this->nonce;
    }

}