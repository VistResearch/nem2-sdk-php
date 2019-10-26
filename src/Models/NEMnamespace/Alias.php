<?php 

namespace NEM\Models\NEMnamespace;

abstract class Alias{
    /**
     * The alias type
     *
     * - 0 : No alias
     * - 1 : Mosaic id alias
     * - 2 : Address alias
     */
    public $type; // number;

    /**
     * The alias address
     */
    public $address; // Address;

    /**
     * The alias mosaicId
     */
    public $mosaicId; // MosaicId;
}