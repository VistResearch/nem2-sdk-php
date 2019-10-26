<?php

namespace NEM\Models\NEMnamespace;

use NEM\Models\NEMnamespace\Alias;
use NEM\Models\Account\Address;

class AddressAlias extends Alias{

    /**
     * Create AddressAlias object
     *
     * @param type
     * @param content
     */
    function __construct(/**
                 * The alias type
                 */
                int $type,
                /**
                 * The alias address
                 */
                Address $address) {

    	$this->type = $type; //number 
    	$this->address = $address; //Adress
    }

    /**
     * Compares AddressAlias for equality.
     *
     * @return boolean
     */
    public function equals($alias): bool{
        if ($alias instanceof AddressAlias) {
            return $this->address->equals($alias->address);
        }
        return false;
    }
}