<?php

namespace NEM\Models\Account;

use NEM\core\keyPair;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Account\Address;

class Account{

	private $address; // Address
	private $keyPair; // Keypair

	function __construct(Address $address, KeyPair $keyPair){
		$this->address = $address;
		$this->keyPair = $keyPair;
		return;
	}

	public function getPrivateKey(): string {
        return $this->keyPair->getPrivateKey();
    }

    public function getPublicAccount(): publicAccount{
    	return PublicAccount::createFromPublicKey($this->keyPair->getPublickey(),$this->address->networkType());
    }

    public function getPublicKey(): string{
    	return $this->keyPair->getPublicKey();
    }

    public function decryptMessage(): string{
    	// need tx
    }

}