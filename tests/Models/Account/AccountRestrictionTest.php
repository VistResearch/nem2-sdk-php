<?php 
// phpUint
use PHPUnit\Framework\TestCase;	

// Test target
use NEM\Models\Account\AccountRestriction;

// input source
use NEM\Models\Account\RestrictionType;

class AccountRestrictionTest extends TestCase{


    public function test(){

        // $testAddress = Address::createFromRawAddress(TestAccountInfo::address);

        $AccName = new AccountRestriction(RestrictionType::AllowAddress, []);

        $this->assertEquals($AccName instanceof AccountRestriction, true);
    }
}
