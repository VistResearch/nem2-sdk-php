<?php

namespace NEM\Models\Account;


class AccountPropertiesInfo {

    /**
     * Constructor
     * @param meta
     * @param accountProperties
     */

    public $meta; // any
    public $accountProperties; //Array of AccountProperties
    function __construct(
                /**
                 * meta
                 */
                $meta,
                /**
                 * Properties.
                 */
                Array $accountProperties) {
        $this->meta = $meta;
        $this->accountProperties = $accountProperties;

    }
}