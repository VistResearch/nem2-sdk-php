<?php

namespace NEM\Core\Format;

use NEM\Core\Format\Utilities as utilities;

class Base32{

    const BITS_5_RIGHT = 31;
    const CHARS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567'; // lower-case
 	/**
     * Base32 encodes a binary buffer.
     * @param {Uint8Array} data The binary data to encode.
     * @returns {string} The base32 encoded string corresponding to the input data.
     */
    public static function Base32Encode($data): string{
 		if (0 !== sizeof($data) % utilities::Decoded_Block_Size) {
            throw new Exception("decoded size must be multiple of ".utilities::Decoded_Block_Size);
        }
        $res = "";
        $dataSize = sizeof($data) / utilities::Decoded_Block_Size;

        for ($inputOffset = 0; $inputOffset < sizeof($data); $inputOffset += utilities::Decoded_Block_Size)
        {

        	$res .= static::CHARS[$data[$inputOffset + 0] >> 3];
		    $res .= static::CHARS[(($data[$inputOffset + 0] & 0x07) << 2) | ($data[$inputOffset + 1] >> 6)];
		    $res .= static::CHARS[($data[$inputOffset + 1] & 0x3E) >> 1];
		    $res .= static::CHARS[(($data[$inputOffset + 1] & 0x01) << 4) | ($data[$inputOffset + 2] >> 4)];
		    $res .= static::CHARS[(($data[$inputOffset + 2] & 0x0F) << 1) | ($data[$inputOffset + 3] >> 7)];
		    $res .= static::CHARS[($data[$inputOffset + 3] & 0x7F) >> 2];
		    $res .= static::CHARS[(($data[$inputOffset + 3] & 0x03) << 3) | ($data[$inputOffset + 4] >> 5)];
		    $res .= static::CHARS[$data[$inputOffset + 4] & 0x1F];


        }
        if(strlen($res) !== $dataSize * utilities::Encoded_Block_Size){
        	throw new Exception("decoded size must be multiple of ".utilities::Decoded_Block_Size);
        }
        
        return $res;
    }


    /**
     * Base32 decodes a base32 encoded string.
     * @param {string} encoded The base32 encoded string to decode.
     * @returns {Uint8Array} The binary data corresponding to the input string.
     */
    public static function Base32Decode(string $data): Array {
    	if (0 !== strlen($data) % utilities::Encoded_Block_Size) {
            throw new Exception("encoded size must be multiple of ".utilities::Encoded_Block_Size);
        }

        $dataSize = strlen($data) / utilities::Encoded_Block_Size;
        $bytes = [];
        $res = [];

        $charMap = array_flip(str_split(static::CHARS));
        $data = strtoupper($data);

        
		for ($inputOffset = 0; $inputOffset < strlen($data); $inputOffset += utilities::Encoded_Block_Size)
        {

        	array_push ($res, ($charMap[$data[$inputOffset + 0]] << 3) | ($charMap[$data[$inputOffset + 1]] >> 2));
		    array_push ($res, (($charMap[$data[$inputOffset + 1]] & 0x03) << 6) | ($charMap[$data[$inputOffset + 2]] << 1) | ($charMap[$data[$inputOffset + 3]] >> 4));
		    array_push ($res, (($charMap[$data[$inputOffset + 3]] & 0x0F) << 4) | ($charMap[$data[$inputOffset + 4]] >> 1));
		    array_push ($res, (($charMap[$data[$inputOffset + 4]] & 0x01) << 7) | ($charMap[$data[$inputOffset + 5]] << 2) | ($charMap[$data[$inputOffset + 6]] >> 3));
		    array_push ($res, (($charMap[$data[$inputOffset + 6]] & 0x07) << 5) | $charMap[$data[$inputOffset + 7]]);


        }

        if(sizeof($res) !== strlen($data) / utilities::Encoded_Block_Size * utilities::Decoded_Block_Size){
        	throw new Exception("encoded size must be multiple of ".utilities::Encoded_Block_Size);
        }
        return $res;
    }
}





