<?php

namespace NEM\Models\Account;

use NEM\Models\Account\RestrictionType;


class AccountRestriction {

    /**
     * Constructor
     * @param restrictionType
     * @param values
     */

    public $restrictionType; //PropertyType
    public $values; // ob

    function __construct(
            /**
             * Account property type
             */
            int $restrictionType,
            /**
             * Property values.
             */
            Array $values) {

    	$this->restrictionType = $restrictionType;
    	$this->values = $values;

    }

}