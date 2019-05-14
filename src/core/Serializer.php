<?php

namespace NEM\Core;

// Doesn't support null string serializenInt

class Serializer{
	const NULL_SENTINEL = 0xffffffff;

	private $data;

	function __construct(){
		$this->data = [];
	}

    public static function strlen($str)
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

	public static function chrToInt(string $chr)
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

    public function serializeInt(int $number = null)
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

    public function serializeString(string $str = null)
    {

        // prepend size on 4 bytes
        $count = strlen($str);
        $uint8 = [self::serializeInt($count)];

        // UTF-8 to binary
        for ($i = 0; $i < $count; $i++) {
            $dec = self::chrToInt(substr($str, $i, 1));
            array_push($uint8, $dec);
        }
        print_r($uint8);
        return $uint8;
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