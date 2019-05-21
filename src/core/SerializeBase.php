<?php

namespace NEM\Core;


// should only serializeInt() and serializeString() in static mode

class SerializeBase{

    public static function serializeUint8(int $l)
    {
        return $l;
    }

 	public static function serializeLong(int $long = null)
    {
        if (null === $long) {
            // long on 8 bytes always
            $uint8 = array_merge($this->serializeInt(null), $this->serializeInt(0));
        }
        else {
            // prepend size on 4 bytes
            $uint64L = $this->serializeInt($long);
            $uint64H = $this->serializeInt($long >> 32);
            $uint8 = array_merge($uint64L, $uint64H);
            if (($len = count($uint8)) === 8) 
                // job done
                return $uint8;
            // right padding to 8 bytes
            for ($i = 0, $done = 8 - $len; $i < $done; $i++) {
                array_push($uint8, 0);
            }
        }
        return $uint8;
    }

    public static function serializeUInt64(Array $UInt64)
    {


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
        return $uint64;
    }

    public static function serializeInt(int $number = null)
    {

        if (null === $number) {
            return $this->serializeInt(self::NULL_SENTINEL);
        }
        else {
            $uint8 = [
                $number         & 0xff,
                ($number >> 8)  & 0xff,
                ($number >> 16) & 0xff,
                ($number >> 24) & 0xff
            ];
        }
        return $uint8;
    }

    public static function parseInt(int $number = null)
    {

        if (null === $number) {
            return $this->serializeInt(self::NULL_SENTINEL);
        }
        else {
            $uint8 = [
                ($number >> 24)  & 0xff,
                ($number >> 16)  & 0xff,
                ($number >> 8 ) & 0xff,
                ($number >> 0 ) & 0xff
            ];
        }
        return $uint8;
    }

    public function serializeString(string $str = null)
    {
    	if ($str === null){
    		// If the parent should be null (provisioning a root namespace), then this field has to be set to 0xff, 0xff, 0xff, 0xff and the next field is omitted!
    		$uint8 = [self::serializeInt($str)];
    	}
    	else{
			// prepend size on 4 bytes
			$count = strlen($str);
            $uint8 = [];

			// UTF-8 to binary
			for ($i = 0; $i < $count; $i++) {
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