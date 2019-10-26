<?php 

// phpUint
use PHPUnit\Framework\TestCase;

// Test target
use NEM\Models\Account\AccountNames;

// input source
use NEM\Models\Account\Address;

// Test data
use NEM\Tests\TestInfo;

class AccountNamesTest extends TestCase{


    public function test(){

        $testAddress = Address::createFromRawAddress(TestInfo::address);

        $AccName = new AccountNames($testAddress, []);

        $this->assertEquals($AccName instanceof AccountNames, true);

    }
}
