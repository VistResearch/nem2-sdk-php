<?php

namespace NEM\Models\Account;

use NEM\Models\Account\Addresss;
use NEM\Models\NEMnamespace\NamespaceName;

class AccountNames {

    /**
     * Constructor
     * @param address
     * @param properties
     */

    public $address;
    public $NamespaceName; // array of AccountProperty


    function __construct(
                /**
                 * Account Address
                 */
                Address $address,
                /**
                 * Properties.
                 */
                Array $NamespaceName) {

    	$this->address = $address;
    	$this->NamespaceName = $NamespaceName;

    }
}