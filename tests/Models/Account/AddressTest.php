<?php 

namespace NEM\Tests\Models\Account;

// Test target
use NEM\Models\Account\Address;

// input source
use NEM\Models\Blockchain\NetworkType;

// Test data
use NEM\Tests\Models\TestAccountInfo;

// Exception
use Exception;


class AddressTest{


    public function Test(){

        // $testAddress = Address::createFromRawAddress(TestAccountInfo::address);

        $Addr = Address::createFromPublicKey(TestAccountInfo::publicKey,NetworkType::MIJIN_TEST);

    	if(!($Addr instanceof Address)){
    		throw new Exception("createFromPublicKey() method failed\n");
    	}

    	if($Addr->networkType() != NetworkType::MIJIN_TEST){
    		throw new Exception("FromPublicKey networkType() method failed\n");
    	}

    	if($Addr->plain() != "SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2"){
    		throw new Exception("FromPublicKey plain() method failed\n");    		
    	}


    	if($Addr->pretty() != "SCTVW2-3D2MN5-VE4AQ4-TZIDZE-NGNOZX-PRPRLI-KCF2"){
    		throw new Exception("FromPublicKey pretty() method failed\n");    		
    	}

    	$Addr = Address::createFromRawAddress("SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2");

    	if(!($Addr instanceof Address)){
    		throw new Exception("createFromRawAddress() method failed\n");
    	}

    	if($Addr->networkType() != NetworkType::MIJIN_TEST){
    		throw new Exception("FromRawAddress networkType() method failed\n");
    	}

    	if($Addr->plain() != "SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2"){
    		throw new Exception("FromRawAddress plain() method failed\n");    		
    	}

    	if($Addr->pretty() != "SCTVW2-3D2MN5-VE4AQ4-TZIDZE-NGNOZX-PRPRLI-KCF2"){
    		throw new Exception("FromRawAddress pretty() method failed\n");    		
    	}

    	$Addr = Address::FromDTO($Addr->toDTO());

    	if(!($Addr instanceof Address)){
    		throw new Exception("DTO method() failed\n");
    	}

    	if($Addr->networkType() != NetworkType::MIJIN_TEST){
    		throw new Exception("DTO networkType() method failed\n");
    	}

    	if($Addr->plain() != "SCTVW23D2MN5VE4AQ4TZIDZENGNOZXPRPRLIKCF2"){
    		throw new Exception("DTO plain() method failed\n");    		
    	}

    	if($Addr->pretty() != "SCTVW2-3D2MN5-VE4AQ4-TZIDZE-NGNOZX-PRPRLI-KCF2"){
    		throw new Exception("DTO pretty() method failed\n");    		
    	}

    	return True;
    }
}
