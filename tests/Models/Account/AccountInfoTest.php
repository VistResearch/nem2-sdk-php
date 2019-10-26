<?php 

// phpUint
use PHPUnit\Framework\TestCase;

// Test target
use NEM\Models\Account\AccountInfo;

// input source
use NEM\Models\Account\Address;
use NEM\Models\Account\PublicAccount;
use NEM\Models\UInt64;
use NEM\Models\Mosaic\NetworkCurrencyMosaic;

// Test data
use NEM\Tests\TestInfo;

class AccountInfoTest extends TestCase{


    public function test(){
    	$testAddress = Address::createFromRawAddress(TestInfo::address);
    	$addressH = UInt64::fromUint(1024);
    	$pbkey = TestInfo::publicKey;
    	$pbkeyH = UInt64::fromUint(1025);
    	$mosaics = [NetworkCurrencyMosaic::createRelative(100)];
    	$importance = UInt64::fromUint(1026);
    	$importanceH = UInt64::fromUint(1027);

    	$AccInfo = new AccountInfo($testAddress, $addressH, $pbkey, $pbkeyH, $mosaics, $importance, $importanceH);

    	$this->assertEquals($AccInfo instanceof AccountInfo, true);

    	$pbAccount = $AccInfo->publicAccount();

        $this->assertEquals($pbAccount instanceof PublicAccount, true);
    }
}
