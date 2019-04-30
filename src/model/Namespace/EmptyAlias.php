<?php
/**
 * The EmptyAlias structure describes empty aliases (type:0)
 *
 * @since 0.10.2
 */

class EmptyAlias extends Alias{
    /**
     * The alias type
     */
    public $type; // number;

    /**
     * Create EmptyAlias object
     *
     * @param type
     * @param content
     */
    function __construct() {
        $this->type = 0;
    }

    /**
     * Compares EmptyAlias for equality.
     *
     * @return boolean
     */
    public function equals($alias): boolean {
    	if ($alias instanceof EmptyAlias){
    		return true;
    	}
    	else{
        	return $alias->type === 0;
    	}
    }
}