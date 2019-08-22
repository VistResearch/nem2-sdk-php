<?php

namespace NEM\Models\Account;

use NEM\Models\Account\AccountRestriction;

class AccountRestrictionsInfo {

    /**
     * Constructor
     * @param meta
     * @param accountProperties
     */

    public $meta; // any
    public $accountRestrictions; //Array of AccountProperties
    function __construct(
                /**
                 * meta
                 */
                $meta,
                /**
                 * Properties.
                 */
                AccountRestriction $accountRestrictions) {
        $this->meta = $meta;
        $this->accountRestrictions = $accountRestrictions;

    }
}