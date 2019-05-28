<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\account\PublicAccount;
use NEM\Models\Transaction\Transaction;

class InnerTransaction extends Transaction{
	public $publicAccount;

	public function buildFromTransaction(Transaction $tx, PublicAccount $pb){
		$this->$publicAccount = $pb;

	    $this->type = $tx->type;
        $this->networkType = $tx->networkType;
        $this->version = $tx->version;
        $this->deadline = $tx->deadline;
        $this->maxFee = $tx->maxFee;
        $this->signature = $tx->signature;
        $this->signer = $tx->signer;
        $this->transactionInfo = $tx->transactionInfo;
    }
}