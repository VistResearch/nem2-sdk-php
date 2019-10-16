<?php 

namespace NEM\Tests\Models\Account;

// Test target
use NEM\Models\Account\PublicAccount;

// input source
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Account\Account;
use NEM\Models\Account\Address;

// Test data
use NEM\Tests\Models\TestAccountInfo;

// Exception
use Exception;


class PublicAccountTest{


    public function Test(){ 
        $testTarget = PublicAccount::createFromPublicKey(TestAccountInfo::publicKey,NetworkType::MIJIN_TEST);

        if(!($testTarget instanceof PublicAccount)){
            throw new Exception("build failed\n");
        }

    	$account = Account::createFromPrivateKey(TestAccountInfo::privateKey,NetworkType::MIJIN_TEST);
        $addr = Address::createFromPublicKey(TestAccountInfo::publicKey,NetworkType::MIJIN_TEST);
        $signed = $account->signData('catapult rocks!');
        $testTarget = $account->publicAccount();

        if(!$testTarget->verifySignature('catapult rocks!',$signed)){
            throw new Exception("verifySignature() method failed\n");
        }

        if(!$testTarget->equals($testTarget)){
            throw new Exception("equals() method failed\n");
        }

        if(!($testTarget->publicKey() === TestAccountInfo::publicKey)){
            throw new Exception("publicKey() method failed\n");
        }

        if(!($testTarget->address()->equals($addr))){
            throw new Exception("address() method failed\n");
        }

        $testTarget_DTO = PublicAccount::fromDTO($testTarget->toDTO());
        if(!($testTarget_DTO->equals($testTarget))){
            throw new Exception("DTO methods failed\n");
            
        }


    	return True;
    }
}
