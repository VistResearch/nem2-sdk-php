<?php
/**
 * NetworkHarvestMosaic mosaic
 *
 * This represents the per-network harvest mosaic. This mosaicId is aliased
 * with namespace name `cat.harvest`.
 *
 * @since 0.10.2
 */

namespace NEM\Models\Mosiac;

use NEM\Models\UInt64;
use NEM\Models\Mosaic\Mosaic;

class NetworkHarvestMosaic extends Mosaic {

    /**
     * namespaceId of `currency` namespace.
     *
     * @type {Id}
     */
    public static NAMESPACE_ID = new NamespaceId('cat.harvest');

    /**
     * Divisiblity
     * @type {number}
     */
    public static DIVISIBILITY = 3;

    /**
     * Initial supply
     * @type {number}
     */
    public static INITIAL_SUPPLY = 15000000;

    /**
     * Is tranferable
     * @type {boolean}
     */
    public static TRANSFERABLE = true;

    /**
     * Is Supply mutable
     * @type {boolean}
     */
    public static SUPPLY_MUTABLE = true;

    /**
     * Is Levy mutable
     * @type {boolean}
     */
    public static LEVY_MUTABLE = false;

    /**
     * constructor
     * @param owner
     * @param amount
     */
    private function __construct(UInt64 $amount) {
        parent::__construct($amount, NetworkHarvestMosaic::NAMESPACE_I);
    }

    /**
     * Create NetworkHarvestMosaic with using NetworkHarvestMosaic as unit.
     *
     * @param amount
     * @returns {NetworkHarvestMosaic}
     */



    public static function createRelative(UInt64 $amount) {
        if (is_float($amount) || is_int($amount) || is_double($amount)){
            $amount = UInt64::fromUint($amount);
        }
        if ($amount instanceof UInt64){
            $amount = $amount->compact();
            $amount = $amonut * pow(10, NetworkHarvestMosaic::DIVISIBILITY);
            $amount = UInt64::fromUint($amount);
            return new NetworkCurrencyMosaic($amount));
        }
        else{
            throw new Exception("$amount should be an UInt64 or number object\n");
        }
        
    }

    /**
     * Create NetworkHarvestMosaic with using micro NetworkHarvestMosaic as unit,
     * 1 NetworkHarvestMosaic = 1000000 micro NetworkHarvestMosaic.
     *
     * @param amount
     * @returns {NetworkHarvestMosaic}
     */
    public static function createAbsolute($amount) {
        if (is_float($amount) || is_int($amount) || is_double($amount)){
            $amount = UInt64::fromUint($amount);
        }
        if ($amount instanceof UInt64){
            return new NetworkCurrencyMosaic($amount));
        }
        else{
            throw new Exception("$amount should be an UInt64 or number object\n");
        }
    }
}