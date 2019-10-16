<?php 

// Test target
use NEM\Models\Account\AccountRestriction;

// input source
use NEM\Models\Account\RestrictionType;

class AccountRestrictionTest{


    public function Test(){

        // $testAddress = Address::createFromRawAddress(TestAccountInfo::address);

        $AccName = new AccountRestriction(RestrictionType::AllowAddress, []);

    	if(!($AccInfo instanceof AccountRestriction)){
    		throw new Exception("AccountRestriction building failed\n");
    	}

    	return True;
    }
}
