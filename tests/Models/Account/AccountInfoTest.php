<?php 

// Test target
use NEM\Models\Account\AccountInfo;

// input source
use NEM\Models\Account\Addresss;
use NEM\Models\Account\PublicAccount;
use NEM\Models\UInt64;
use NEM\Models\Mosaic\NetworkCurrencyMosaic;

// Test data
use NEM\tests\TestAccountInfo;

class AccountInfoTest{


    public function Test(){
    	$testAddress = Address::createFromRawAddress(TestAccountInfo::address);
    	$addressH = UInt64::fromUint(1024);
    	$pbkey = TestAccountInfo::publicKey;
    	$pbkeyH = UInt64::fromUint(1025);
    	$mosaics = [NetworkCurrencyMosaic::createRelative(100)];
    	$importance = UInt64::fromUint(1026);
    	$importanceH = UInt64::fromUint(1027);

    	$AccInfo = new AccountInfo($testAddress, $addressH, $pbkey, $pbkeyH, $mosaics, $importance, $importanceH);

    	if(!($AccInfo instanceof AccountInfo)){
    		throw new Exception("AccountInfo building failed\n");
    	}

    	$pbAccount = $AccInfo->publicAccount();

    	if(!($pbAccount instanceof PublicAccount)){
    		throw new Exception("AccountInfo publicAccount method failed\n");
    	}

    	return True;
    }
}
