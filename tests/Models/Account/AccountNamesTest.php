<?php 

// Test target
use NEM\Models\Account\AccountNames;

// input source
use NEM\Models\Account\Addresss;

// Test data
use NEM\tests\TestAccountInfo;

class AccountNamesTest{


    public function Test(){

        $testAddress = Address::createFromRawAddress(TestAccountInfo::address);

        $AccName = new AccountNames($testAddress, []);

    	if(!($AccInfo instanceof AccountNames)){
    		throw new Exception("AccountInfo building failed\n");
    	}

    	return True;
    }
}
