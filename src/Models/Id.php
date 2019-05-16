<?php 

namespace NEM\Models;

use NEM\Models\UInt64;

class Id extends UInt64 {
    // public static function fromHex(string $hexId): Id {
    //     $higher = parseInt(hexId.substr(0, 8), 16);
    //     $lower = parseInt(hexId.substr(8, 8), 16);

    //     return new Id([lower, higher]);
    // }

    /**
     * Get string value of id
     * @returns {string}
     */
    public function toHex(): string {
        $part1 = dechex($this->higher);
        $part2 = dechex($this->lower);

        return $this->pad($part1, 8) + $this->pad($part2, 8);
    }

    /**
     * @param str
     * @param maxVal
     * @returns {string}
     */
    private function pad($str, $maxVal): string {
        return (strlen($str) < $maxVal ? $this->pad(`0${str}`, $maxVal) : $str);
    }

}