<?php


use NEM\Models\Account\Account;
use NEM\core\keyPair;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Account\Address;
use NEM\Models\Blockchain\NetworkType;



class AccountTest{
    public $accountInformation = [
        "address" => 'SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2',
        "privateKey" => '26b64cb10f005e5988a36744ca19e20d835ccc7c105aaa5f3b212da593180930',
        "publicKey" => 'c2f93346e27ce6ad1a9f8f5e3066f8326593a406bdf357acb041e2f9ab402efe',
    ];

    static function Test(){
        
        $account = Account::createFromPrivateKey($this->accountInformation["privateKey"],NetworkType::MIJIN_TEST);

        if(! ($account->getPrivateKey() === $this->accountInformation["privateKey"] ) ){
        	throw new Exception("account->getPrivateKey Error");
        }

        if(! ($account->getPublicKey() === $this->accountInformation["publicKey"] )){
            throw new Exception("account->getPublicKey Error");
        }

        if(! ($account->address->plain() === $this->accountInformation["address"] )){
            throw new Exception("account address Error");
        }

        print("should throw exception when the private key is not valid\n");
        $account = Account::createFromPrivateKey("",NetworkType::MIJIN_TEST);

        $account = Account::generateNewAccount(NetworkType::MIJIN_TEST);
        if(! ($account->getPrivateKey() === none  ) ){
            throw new Exception("new account->getPrivateKey Error");
        }

        if(! ($account->getPublicKey() === none  )){
            throw new Exception("new account->getPublicKey Error");
        }

        if(! ($account->address->plain() === none )){
            throw new Exception("new account address Error");
        }

        $account = Account::createFromPrivateKey($this->accountInformation["privateKey"],NetworkType::MIJIN_TEST);
        $publicAccount = $account->publicAccount();
        $signed = $account->signData('catapult rocks!');
        if(! $publicAccount->verifySignature('catapult rocks!',$signed)){
            throw new Exception("verify failed");
        }

    }    
}

