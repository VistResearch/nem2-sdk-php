<?php

namespace NEM\Models\Mosaic;

use NEM\Models\UInt64;
use NEM\Models\Mosaic\Mosaic;
use NEM\Models\NEMnamespace\NamespaceId;

class NetworkCurrencyMosaic extends Mosaic {

    /**
     * namespaceId of `currency` namespace.
     *
     * @type {Id}
     */
    public static function NAMESPACE_ID(){
        return new NamespaceId('cat.currency');
    }

    /**
     * Divisiblity
     * @type {number}
     */
    const DIVISIBILITY = 6;

    /**
     * Initial supply
     * @type {number}
     */
    const INITIAL_SUPPLY = 8999999998;

    /**
     * Is tranferable
     * @type {boolean}
     */
    const TRANSFERABLE = true;

    /**
     * Is Supply mutable
     * @type {boolean}
     */
    const SUPPLY_MUTABLE = false;

    /**
     * Is Levy mutable
     * @type {boolean}
     */
    const LEVY_MUTABLE = false;

    /**
     * constructor
     * @param owner
     * @param amount
     */
    private function __construct(UInt64 $amount) {
        parent::__construct($amount, NetworkCurrencyMosaic::NAMESPACE_ID());
    }

    /**
     * Create NetworkCurrencyMosaic with using NetworkCurrencyMosaic as unit.
     *
     * @param amount
     * @returns {NetworkCurrencyMosaic}
     */

    public static function createRelative($amount) {
        if (is_float($amount) || is_int($amount) || is_double($amount)){
            $amount = UInt64::fromUint($amount);
        }
        if ($amount instanceof UInt64){
            $amount = $amount->compact();
            $amount = $amount * pow(10, NetworkCurrencyMosaic::DIVISIBILITY);
            $amount = UInt64::fromUint($amount);
            return new NetworkCurrencyMosaic($amount);
        }
        else{
            throw new Exception("$amount should be an UInt64 or number object\n");
        }
        
    }

    /**
     * Create NetworkCurrencyMosaic with using micro NetworkCurrencyMosaic as unit,
     * 1 NetworkCurrencyMosaic = 1000000 micro NetworkCurrencyMosaic.
     *
     * @param amount
     * @returns {NetworkCurrencyMosaic}
     */

    public static function createAbsolute($amount) {
        if (is_float($amount) || is_int($amount) || is_double($amount)){
            $amount = UInt64::fromUint($amount);
        }
        if ($amount instanceof UInt64){
            return new NetworkCurrencyMosaic($amount);
        }
        else{
            throw new Exception("$amount should be an UInt64 or number object\n");
        }
    }

}