<?php
class MosaicProperties {

    /**
     * The creator can choose between a definition that allows a mosaic supply change at a later point or an immutable supply.
     * Allowed values for the property are "true" and "false". The default value is "false".
     */
    public $supplyMutable; // bool;

    /**
     * The creator can choose if the mosaic definition should allow for transfers of the mosaic among accounts other than the creator.
     * If the property 'transferable' is set to "false", only transfer transactions
     * having the creator as sender or as recipient can transfer mosaics of that type.
     * If set to "true" the mosaics can be transferred to and from arbitrary accounts.
     * Allowed values for the property are thus "true" and "false". The default value is "true".
     */
    public $transferable; //bool;

    /**
     * Levy mutable
     */
    public $levyMutable; //bool

    /**
     * @param flags
     * @param divisibility
     * @param duration
     */
    function __construct(UInt64 $flags,
                /**
                 * The divisibility determines up to what decimal place the mosaic can be divided into.
                 * Thus a divisibility of 3 means that a mosaic can be divided into smallest parts of 0.001 mosaics
                 * i.e. milli mosaics is the smallest sub-unit.
                 * When transferring mosaics via a transfer transaction the quantity transferred
                 * is given in multiples of those smallest parts.
                 * The divisibility must be in the range of 0 and 6. The default value is "0".
                 */
                int $divisibility,
                /**
                 * The duration in blocks a mosaic will be available.
                 * After the duration finishes mosaic is inactive and can be renewed.
                 * Duration is optional when defining the mosaic
                 */
                UInt64 $duration) {

        $flagsLow = $flags->lower;

        $this->supplyMutable = ($flagsLow % 2 === 1);
        $this->transferable = ( (int)($flagsLow >> 1) % 2 === 1);
        $this->levyMutable = ( (int)($flagsLow >> 2) % 2 === 1);
    }

    /**
     * Static constructor function with default parameters
     * @returns {MosaicProperties}
     * @param params
     */
    public static create(bool $supplyMutable,bool $transferable,bool $levyMutable,
    			        int $divisibility,int $duration) {
        $flagsNum = ($supplyMutable ? 1 : 0) + ($transferable ? 2 : 0) + ($levyMutable ? 4 : 0);
        return new MosaicProperties(UInt64::fromUint($flagsNum), $divisibility, $duration);
    }

}