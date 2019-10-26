<?php

// phpUint
use PHPUnit\Framework\TestCase;

// Test target
use NEM\Models\Account\Account;

// input source
use NEM\Models\Account\PublicAccount;
use NEM\Models\Account\Address;
use NEM\Models\Blockchain\NetworkType;

// Test data
use NEM\Tests\TestInfo;

class AccountTest extends TestCase{

    public function test(){
        
        $account = Account::createFromPrivateKey(TestInfo::privateKey,NetworkType::MIJIN_TEST);

        $this->assertEquals($account->privateKey(), TestInfo::privateKey);


        $this->assertEquals($account->publicKey(), TestInfo::publicKey);

        $this->assertEquals($account->address->plain(), TestInfo::address );

        
        $account = Account::generateNewAccount(NetworkType::MIJIN_TEST);
        $this->assertNotNull($account->privateKey());

        $this->assertNotNull($account->publicKey());

        $this->assertNotNull($account->address->plain());

        $account = Account::createFromPrivateKey(TestInfo::privateKey,NetworkType::MIJIN_TEST);
        $publicAccount = $account->publicAccount();
        $signed = $account->signData('catapult rocks!');
        
        $this->assertEquals($publicAccount->verifySignature('catapult rocks!',$signed), true);

    }    
}

