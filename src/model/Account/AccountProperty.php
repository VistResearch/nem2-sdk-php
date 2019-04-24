<?php
require_once dirname(__FILE__) ."\\..\\..\\innerLoader.php";

class AccountProperty {

    /**
     * Constructor
     * @param propertyType
     * @param values
     */

    public $propertyType; //PropertyType
    public $values; // ob

    function __construct(
            /**
             * Account property type
             */
            PropertyType $propertyType,
            /**
             * Property values.
             */
            Array $values) {

    	$this->propertyType = $propertyType;
    	$this->values = $values;

    }

}