<?php

require_once dirname(__FILE__) ."\\..\\..\\innerLoader.php";

class MultisigAccountInfo{
	public $account; // public account object
	public $cosignatories; //list of public account object
	public $minApproval; // int >= 0
	public $minRemoval; // int >= 0
	public $multisigAccounts; //public account object

    function __construct(PublicAccount $account,Array $cosignatories, int $minApproval, int $minRemoval, PublicAccount $multisigAccounts) {
        $this->account = $account;
        $this->cosignatories = $cosignatories;
        $this->minApproval = $minApproval;
        $this->minRemoval = $minRemoval;
        $this->multisigAccounts = $multisigAccounts;
    }

    /**
     * Checks if the account is a multisig account.
     * @returns {boolean}
     */
    public function isMultisig(): boolean {
        return $this->minRemoval !== 0 && $this->minApproval !== 0;
    }

    /**
     * Checks if an account is cosignatory of the multisig account.
     * @param account
     * @returns {boolean}
     */
    public function hasCosigner(PublicAccount $account): boolean {
        return in_array($account,$this->cosignatories);
    }

    /**
     * Checks if the multisig account is cosignatory of an account.
     * @param account
     * @returns {boolean}
     */
    public function isCosignerOfMultisigAccount(PublicAccount $account): boolean {
        return in_array($account,$this->multisigAccounts);
    }

}