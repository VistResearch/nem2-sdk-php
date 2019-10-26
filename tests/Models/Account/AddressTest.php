<?php 

// phpUint
use PHPUnit\Framework\TestCase;

// Test target
use NEM\Models\Account\Address;

// input source
use NEM\Models\Blockchain\NetworkType;

// Test data
use NEM\Tests\TestInfo;




class AddressTest extends TestCase{


    public function test(){

        // $testAddress = Address::createFromRawAddress(TestAccountInfo::address);

        $Addr = Address::createFromPublicKey(TestInfo::publicKey,NetworkType::MIJIN_TEST);

    	$this->assertEquals($Addr instanceof Address, true);

    	$this->assertEquals($Addr->networkType(), NetworkType::MIJIN_TEST);

    	$this->assertEquals($Addr->plain(), "SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2");


    	$this->assertEquals($Addr->pretty(), "SCTVW2-3D2MN5-VE4AQ4-TZIDZE-NGNOZX-PRPRLI-KCF2");

    	$Addr = Address::createFromRawAddress("SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2");

    	$this->assertEquals($Addr instanceof Address, true);

    	$this->assertEquals($Addr->networkType(), NetworkType::MIJIN_TEST);

    	$this->assertEquals($Addr->plain(), "SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2");

    	$this->assertEquals($Addr->pretty(), "SCTVW2-3D2MN5-VE4AQ4-TZIDZE-NGNOZX-PRPRLI-KCF2");

    	$Addr = Address::FromDTO($Addr->toDTO());

    	$this->assertEquals($Addr instanceof Address, true);

    	$this->assertEquals($Addr->networkType(), NetworkType::MIJIN_TEST);

    	$this->assertEquals($Addr->plain(), "SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2");

    	$this->assertEquals($Addr->pretty(), "SCTVW2-3D2MN5-VE4AQ4-TZIDZE-NGNOZX-PRPRLI-KCF2");

    }
}
