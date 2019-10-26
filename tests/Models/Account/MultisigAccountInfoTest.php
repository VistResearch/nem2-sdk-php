<?php

// phpUint
use PHPUnit\Framework\TestCase;

// Test Target
use NEM\Models\Account\MultisigAccountInfo;

// input source
use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;


// Test data
use NEM\Tests\TestInfo;

class MultisigAccountInfoTest extends TestCase{
	public function test(){
		$testpbAcc = PublicAccount::createFromPublicKey(TestInfo::publicKey,NetworkType::MIJIN_TEST);
		$cosignatories = [PublicAccount::createFromPublicKey('53C659B47C176A70EB228DE5C0A0FF391282C96640C2A42CD5BBD0982176AB1B',NetworkType::MIJIN_TEST)];

		$minApproval = 0;
		$minRemoval = 0;
		$multisigAccounts = [PublicAccount::createFromPublicKey('3FE4A1AA148F5E76891CE924F5DC05627A87047B2B4AD9242C09C0ECED9B2338',NetworkType::MIJIN_TEST)];

		$testTarget = new MultisigAccountInfo($testpbAcc, $cosignatories, $minApproval, $minRemoval, $multisigAccounts);

		$this->assertEquals($testTarget instanceof MultisigAccountInfo, true);

		$this->assertEquals($testTarget->isMultisig(), false);

		$this->assertEquals($testTarget->hasCosigner($cosignatories[0]), true);

		$this->assertEquals($testTarget->hasCosigner($multisigAccounts[0]), false);


		$this->assertEquals($testTarget->isCosignerOfMultisigAccount($multisigAccounts[0]), true);

		$this->assertEquals($testTarget->isCosignerOfMultisigAccount($cosignatories[0]), false);

		$minApproval = 1;
		$minRemoval = 2;
		$testTarget = new MultisigAccountInfo($testpbAcc, $cosignatories, $minApproval, $minRemoval, $multisigAccounts);

		$this->assertEquals($testTarget instanceof MultisigAccountInfo, true);

		$this->assertEquals($testTarget->isMultisig(), true);

	}
}
