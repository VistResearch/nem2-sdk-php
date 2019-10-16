<?php

namespace NEM\Tests\Models\Account;

// Test Target
use NEM\Models\Account\MultisigAccountInfo;

// input source
use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;

// Test data
use NEM\Tests\Models\TestAccountInfo;

// Exception
use Exception;

class MultisigAccountInfoTest{
	static function test(){
		$testpbAcc = PublicAccount::createFromPublicKey(TestAccountInfo::publicKey,NetworkType::MIJIN_TEST);
		$cosignatories = [PublicAccount::createFromPublicKey('53C659B47C176A70EB228DE5C0A0FF391282C96640C2A42CD5BBD0982176AB1B',NetworkType::MIJIN_TEST)];

		$minApproval = 0;
		$minRemoval = 0;
		$multisigAccounts = [PublicAccount::createFromPublicKey('3FE4A1AA148F5E76891CE924F5DC05627A87047B2B4AD9242C09C0ECED9B2338',NetworkType::MIJIN_TEST)];

		$testTarget = new MultisigAccountInfo($testpbAcc, $cosignatories, $minApproval, $minRemoval, $multisigAccounts);

		if(!($testTarget instanceof MultisigAccountInfo)){
			throw new Exception("build failed\n");
		}

		if($testTarget->isMultisig()){
			throw new Exception("isMultisig() failed for false return value\n");
		}

		if(!$testTarget->hasCosigner($cosignatories[0])){
			throw new Exception("hasCosigner() failed for true return value\n");
		}

		if($testTarget->hasCosigner($multisigAccounts[0])){
			throw new Exception("hasCosigner() failed for false return value\n");
		}


		if(!$testTarget->isCosignerOfMultisigAccount($multisigAccounts[0])){
			throw new Exception("isCosignerOfMultisigAccount() failed for true return value\n");
		}

		if($testTarget->isCosignerOfMultisigAccount($cosignatories[0])){
			throw new Exception("isCosignerOfMultisigAccount() failed for false return value\n");
		}

		$minApproval = 1;
		$minRemoval = 2;
		$testTarget = new MultisigAccountInfo($testpbAcc, $cosignatories, $minApproval, $minRemoval, $multisigAccounts);

		if(!($testTarget instanceof MultisigAccountInfo)){
			throw new Exception("second build failed\n");
		}

		if(!$testTarget->isMultisig()){
			throw new Exception("isMultisig() failed for true return value\n");
		}

	}
}
