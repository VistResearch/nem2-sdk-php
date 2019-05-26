<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\account\PublicAccount;
use NEM\Models\Transaction\Transaction;

class InnerTransaction extends Transaction{
	public $publicAccount;
}