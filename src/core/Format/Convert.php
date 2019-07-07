<?php

namespace NEM\Core\Format;

use NEM\Core\Format\Utilities as utilities;

// rstr2utf8() and utf8ToHex ()not implimented, please check 
// https://github.com/nemtech/nem2-sdk-typescript-javascript/blob/master/src/core/format/Convert.ts
// for detail.

class Convert{
 /**
     * Decodes two hex characters into a byte.
     * @param {string} char1 The first hex digit.
     * @param {string} char2 The second hex digit.
     * @returns {number} The decoded byte.
     */
    static function toByte(string $char1,string $char2){
        if (! (ctype_xdigit($char1) and ctype_xdigit($char2) ) ) {
            throw Error(`unrecognized hex char`);
        }

        return (hexdec($char1) << 4 )| hexdec($char2) ;
    }
    /**
     * Determines whether or not a string is a hex string.
     * @param {string} input The string to test.
     * @returns {boolean} true if the input is a hex string, false otherwise.
     */
    static function isHexString(string $input): bool{
        if (0 !== strlen($input) % 2) {
            return false;
        }
        return ctype_xdigit($input);
    }

    /**
     * Converts a hex string to a uint8 array.
     * @param {string} input A hex encoded string.
     * @returns {Uint8Array} A uint8 array corresponding to the input.
     */
    static function hexToUint8(string $input): Array{
        if (0 !== strlen($input) % 2) {
            throw Error(`hex string has unexpected size`);
        }
        return unpack("C*",pack("H*", $input));
    }

    /**
     * Reversed convertion hex string to a uint8 array.
     * @param {string} input A hex encoded string.
     * @returns {Uint8Array} A uint8 array corresponding to the input.
     */
    static function hexToUint8Reverse(string $input): Array{
        if (0 !== strlen($input) % 2) {
            throw Error(`hex string has unexpected size`);
        }
        return array_reverse(unpack("C*",pack("H*", $input)));
    }

    /**
     * Converts a uint8 array to a hex string.
     * @param {Uint8Array} input A uint8 array.
     * @returns {string} A hex encoded string corresponding to the input.
     */
    static function uint8ToHex(Array $input):string{
    	$chars = array_map("chr", $input);
    	$bin = join($chars);
    	$hex = bin2hex($bin);

        return $hex;
    }
    /**
     * Converts a uint8 array to a uint32 array.
     * @param {Uint8Array} input A uint8 array.
     * @returns {Uint32Array} A uint32 array created from the input.
     */
    static function uint8ToUint32(Array $input):Array{
    	$output = [];
    	$shift = [24,16,8,0];
    	$t = 0;
    	for($i = 0;$i < sizeof($input); $i += 1){
    		$t |= $input[$i] << $shift[$i%4];
    		if($i % 4 == 3){
    			array_push($output, $t);
    			$t = 0;
    		}    		
    	}
    	if (sizeof($input) % 4 != 0){
    		array_push($output, $t);
    	}

    	return $output;
    }

    /**
     * Converts a uint32 array to a uint8 array.
     * @param {Uint32Array} input A uint32 array.
     * @returns {Uint8Array} A uint8 array created from the input.
     */
    static function uint32ToUint8(Array $input):Array{
    	$output = [];
    	for($i = 0;$i < sizeof($input); $i += 1){
    		array_push($output,$input[$i]>>24 & 0xff);	
    		array_push($output,$input[$i]>>16 & 0xff);	
    		array_push($output,$input[$i]>>8 & 0xff);
    		array_push($output,$input[$i]>>0 & 0xff);
    	}
    	return $output;
    }

    /** Converts an unsigned byte to a signed byte with the same binary representation.
     * @param {number} input An unsigned byte.
     * @returns {number} A signed byte with the same binary representation as the input.
     *
     */
    static function uint8ToInt8($input){
        if (0xFF < $input) {
            throw Error(`input '${input}' is out of range`);
        }
        return $input << 24 >> 24;
    }

    /** Converts a signed byte to an unsigned byte with the same binary representation.
     * @param {number} input A signed byte.
     * @returns {number} An unsigned byte with the same binary representation as the input.
     */
    static function int8ToUint8($input){
        if (127 < $input || -128 > $input) {
            throw Error(`input '${input}' is out of range`);
        }
        return $input & 0xFF;
    }
}









