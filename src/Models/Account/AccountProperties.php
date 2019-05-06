<?php

namespace NEM\Models\Account;

use NEM\Models\Account\Addresss;

class AccountProperties {

    /**
     * Constructor
     * @param address
     * @param properties
     */

    public $address;
    public $properties; // array of AccountProperty


    function __construct(
                /**
                 * Account Address
                 */
                Adrress $address,
                /**
                 * Properties.
                 */
                Array $properties) {

    	$this->address = $address;
    	$this->properties = $properties;

    }
}