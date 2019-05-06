<?php

namespace NEM\Models;

class UInt64 {

    /**
     * uint64 lower part
     */
    public $lower;//: number;

    /**
     * uint64 higher part
     */
    public $higher; //: number;

    /**
     * Create from uint value
     * @param value
     * @returns {UInt64}
     */
    public static function fromUint($value): UInt64 {
        if ($value < 0) {
            throw new Error('Unsigned integer cannot be negative');
        }
        $inputParameter = [(int) ($value & 0xFFFFFFFF), (int) floor($value / 0x100000000)];
        return new UInt64($inputParameter);
    }

    /**
     * Parses a hex string into a UInt64.
     * @param {string} input A hex encoded string.
     * @returns {module:coders/uint64~uint64} The uint64 representation of the input.
     */
    public static function fromHex(string $input): UInt64 {
        $lower = substr($input, 8,8);
        $higher = substr($input, 0,8);

        $lower = hexdec($lower);
        $higher = hexdec($higher);
        return new UInt64([(int)$lower,(int)$higher]);
    }

    /**
     * Constructor
     * @param uintArray
     */
    function __construct(Array $uintArray) {
        if (sizeof($uintArray) !== 2 || $uintArray[0] < 0 || $uintArray[1] < 0) {
            throw new Error('uintArray must be be an array of two uint numbers');
        }
        $this->lower = $uintArray[0];
        $this->higher = $uintArray[1];
    }


    /**
     * Get hexadecimal representation
     *
     * @return {string}
     */
    public function toHex(): string {
        return str_pad(dechex($this->higher),8,'0',STR_PAD_LEFT)
                .str_pad(dechex($this->lower),8,'0',STR_PAD_LEFT);
    }

    /**
     * Compact higher and lower uint parts into a uint
     * @returns {number}
     */
    public function compact(){
        if (($this->higher*0x100000000 + $this->lower) > PHP_INT_MAX){
            return null;
        }
        return $this->higher*0x100000000 + $this->lower;
    }

    /**
     * Compares for equality
     * @param other
     * @returns {boolean}
     */
    public function equals(UInt64 $other): bool {
        return $this->lower === $other->lower && $this->higher === $other->higher;
    }
}