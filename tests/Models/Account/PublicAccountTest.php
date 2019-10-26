<?php 

// phpUint
use PHPUnit\Framework\TestCase;

// Test target
use NEM\Models\Account\PublicAccount;

// input source
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Account\Account;
use NEM\Models\Account\Address;

// Test data
use NEM\Tests\TestInfo;



class PublicAccountTest extends TestCase{


    public function test(){ 
        $testTarget = PublicAccount::createFromPublicKey(TestInfo::publicKey,NetworkType::MIJIN_TEST);

        
        $this->assertEquals($testTarget instanceof PublicAccount, true);

    	$account = Account::createFromPrivateKey(TestInfo::privateKey,NetworkType::MIJIN_TEST);
        $addr = Address::createFromPublicKey(TestInfo::publicKey,NetworkType::MIJIN_TEST);
        $signed = $account->signData('catapult rocks!');
        $testTarget = $account->publicAccount();

        $this->assertEquals($testTarget->verifySignature('catapult rocks!',$signed), true);

        $this->assertEquals($testTarget->equals($testTarget), true);

        $this->assertEquals($testTarget->publicKey(), TestInfo::publicKey);

        $this->assertEquals($testTarget->address()->equals($addr), true);

        $testTarget_DTO = PublicAccount::fromDTO($testTarget->toDTO());
        $this->assertEquals($testTarget_DTO->equals($testTarget), true);


    }
}
