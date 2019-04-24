<?php 

abstract class Alias{
    /**
     * The alias type
     *
     * - 0 : No alias
     * - 1 : Mosaic id alias
     * - 2 : Address alias
     */
    protected $type; // number;

    /**
     * The alias address
     */
    protected $address; // Address;

    /**
     * The alias mosaicId
     */
    protected $mosaicId; // MosaicId;
}