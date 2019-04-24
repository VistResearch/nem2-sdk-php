<?php

class MosaicAlias extends Alias {

    /**
     * Create AddressAlias object
     *
     * @param type
     * @param mosaicId
     */



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
    public toHex(): string {
        return $this->mosaicId->toHex();
    }
}