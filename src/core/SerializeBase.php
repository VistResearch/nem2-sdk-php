<?php

namespace NEM\Core;


// should only serializeInt() and serializeString() in static mode

class SerializeBase{

    public static function serializeUInt8(int $l)
    {
        return [($l >> 0) & 0xff];
    }
    public static function serializeUInt16(int $l, $flag = false)
    {
        if($flag){
            return [($l >> 0) & 0xff, ($l >> 8) & 0xff];  
        }
        return [($l >> 8) & 0xff, ($l >> 0) & 0xff];
    }
    public static function serializeUInt32(int $l, $flag = false)
    {
        if($flag){
            return [($l >> 0) & 0xff,
                ($l >> 8) & 0xff,
                ($l >> 16) & 0xff,
                ($l >> 24) & 0xff];
        }
        return [($l >> 24) & 0xff,
                ($l >> 16) & 0xff,
                ($l >> 8 ) & 0xff,
                ($l >> 0 ) & 0xff];
    }

    public static function serializeUInt64(Array $UInt64, $flag = false)
    {
        if ($flag == true){
            $uint64 = [
                ($UInt64[0] >> 0) & 0xff,
                ($UInt64[0] >> 8)  & 0xff,
                ($UInt64[0] >> 16) & 0xff,
                ($UInt64[0] >> 24) & 0xff,
                ($UInt64[1] >> 0)  & 0xff,
                ($UInt64[1] >> 8)  & 0xff,
                ($UInt64[1] >> 16) & 0xff,
                ($UInt64[1] >> 24) & 0xff
            ];
        }
        else{
            $uint64 = [
                ($UInt64[1] >> 24) & 0xff,
                ($UInt64[1] >> 16)  & 0xff,
                ($UInt64[1] >> 8 ) & 0xff,
                ($UInt64[1] >> 0 ) & 0xff,
                ($UInt64[0] >> 24)  & 0xff,
                ($UInt64[0] >> 16)  & 0xff,
                ($UInt64[0] >> 8 ) & 0xff,
                ($UInt64[0] >> 0 ) & 0xff
            ];            
        }

        return $uint64;
    }


    public function serializeString(string $str = null)
    {
    	if ($str === null){
    		// If the parent should be null (provisioning a root namespace), then this field has to be set to 0xff, 0xff, 0xff, 0xff and the next field is omitted!
    		$uint8 = [];
    	}
    	else{
			// prepend size on 4 bytes
			$count = strlen($str);
            $uint8 = [];

			// UTF-8 to binary
			for ($i = 0; $i < $count ; $i++) {
			    $dec = self::chrToInt(substr($str, $i, 1));
			    array_push($uint8, $dec);
			}		
    	}
		return $uint8;

    }



	protected function strlen($str)
    {
        /* Type checks: */
        if (!is_string($str)) {
            throw new TypeError('String expected');
        }

        return (int) (
        self::isMbStringOverride()
            ? mb_strlen($str, '8bit')
            : strlen($str)
        );
    }

	protected static function chrToInt(string $chr)
    {
        /* Type checks: */
        if (!is_string($chr)) {
            throw new TypeError('Argument 1 must be a string, ' . gettype($chr) . ' given.');
        }
        if (self::strlen($chr) !== 1) {
            throw new Exception('chrToInt() expects a string that is exactly 1 character long');
        }
        /** @var array<int, int> $chunk */
        $chunk = unpack('C', $chr);
        return (int) ($chunk[1]);
    }



    protected static function isMbStringOverride()
    {
        static $mbstring = null;

        if ($mbstring === null) {
            $mbstring = extension_loaded('mbstring')
                &&
            ((int) (ini_get('mbstring.func_overload')) & MB_OVERLOAD_STRING);
        }
        /** @var bool $mbstring */

        return $mbstring;
    }
}