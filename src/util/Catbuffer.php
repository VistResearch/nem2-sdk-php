<?php
// ref from https://php.net/manual/en/function.pack.php
class Catbuffer{
    public static function uInt8($i) {
        return is_int($i) ? pack("C", $i) : unpack("C", $i)[1];
    }

    public static function uInt16($i, $endianness=false) {
        $f = is_int($i) ? "pack" : "unpack";

        if ($endianness === true) {  // big-endian
            $i = $f("n", $i);
        }
        else if ($endianness === false) {  // little-endian
            $i = $f("v", $i);
        }
        else if ($endianness === null) {  // machine byte order
            $i = $f("S", $i);
        }

        return is_array($i) ? $i[1] : $i;
    }


    public static function uInt32($i, $endianness=false) {
        $f = is_int($i) ? "pack" : "unpack";

        if ($endianness === true) {  // big-endian
            $i = $f("N", $i);
        }
        else if ($endianness === false) {  // little-endian
            $i = $f("V", $i);
        }
        else if ($endianness === null) {  // machine byte order
            $i = $f("L", $i);
        }

        return is_array($i) ? $i[1] : $i;
    }

    public static function uInt64_encode($i, $endianness=false) {
        $f = "pack";

        if ($endianness === true) {  // big-endian
            $i = $f("J", $i);
        }
        else if ($endianness === false) {  // little-endian
            $i = $f("P", $i);
        }
        else if ($endianness === null) {  // machine byte order
            $i = $f("Q", $i);
        }
        return $i;
    }
    public static function uInt64_decode($i, $endianness=false) {
        $f = "unpack";

        if ($endianness === true) {  // big-endian
            $i = $f("J*", $i);
        }
        else if ($endianness === false) {  // little-endian
            $i = $f("P*", $i);
        }
        else if ($endianness === null) {  // machine byte order
            $i = $f("Q*", $i);
        }
        return $i;
    }
}
?>