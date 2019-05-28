<?php

namespace NEM\Tests;

use NEM\Models\Account\Account;
use NEM\core\keyPair;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Account\Address;

class AccountTest{
    static function Test(){
        $kp = Keypair::generateNewPair();
        $addr = Address::createFromPublicKey(Keypair::privatekeyToPublicbkey($kp->getPrivateKey()),0x60);
        
        $account = new Account($addr,$kp);

        if(! ($account->getPrivateKey() === $kp->getPrivateKey() ) ){
        	throw new Exception("account->getPrivateKey Error");
        }

        if(! ($account->getPublicAccount()->equals(PublicAccount::createFromPublicKey($kp->getPublicKey(),0x60))) ){
        	throw new Exception("account->getPublicAccount Error");
        }

        if(! ($account->getPublicKey() === $kp->getPublicKey())){
        	throw new Exception("account->getPublicKey Error");
        }
    }    
}

