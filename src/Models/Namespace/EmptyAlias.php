<?php
/**
 * The EmptyAlias structure describes empty aliases (type:0)
 *
 * @since 0.10.2
 */

namespace NEM\Models\Namespace;

use NEM\Models\Namespace\Alias;

class EmptyAlias extends Alias{

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