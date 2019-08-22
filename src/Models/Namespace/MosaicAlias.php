<?php

namespace NEM\Models\Namespace;

use NEM\Models\Namespace\Alias;
use NEM\Models\Mosaic\MosaicId;

class MosaicAlias extends Alias {

    /**
     * Create AddressAlias object
     *
     * @param type
     * @param mosaicId
     */
    function __construct($type, MosaicId $mosaicId) {
            $this->type = $type;
            $this->mosaicId = $mosaicId;
    }


    /**
     * Compares AddressAlias for equality.
     *
     * @return boolean
     */
    public function equals($alias): boolean {
        if ($alias instanceof MosaicAlias) {
            return $this->mosaicId->equals($alias->mosaicId);
        }
        return false;
    }

    /**
     * Get string value of mosaicId
     * @returns {string}
     */
    public function toHex(): string {
        return $this->mosaicId->toHex();
    }
}