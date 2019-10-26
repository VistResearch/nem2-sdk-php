<?php
// phpUint
use PHPUnit\Framework\TestCase;

// Test Target
use NEM\Models\Mosaic\MosaicId;

// input source
use NEM\Models\Mosaic\MosaicNonce;
use NEM\Models\UInt64;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;

// Test data
use NEM\Tests\TestInfo;


class MosaicIdTest extends TestCase{
	public function test(){

		$testMosaicId = new MosaicId([0,0]);

		$this->assertEquals($testMosaicId instanceof MosaicId, true);

		$pbAcc = PublicAccount::createFromPublicKey(TestInfo::publicKey, NetworkType::MIJIN_TEST);
		$nonce = MosaicNonce::createFromHex("00000000");

		$testMosaicId = MosaicId::createFromNonce($nonce, $pbAcc);

		$this->assertEquals($testMosaicId instanceof MosaicId, true);

		$testMosaicId2 = MosaicId::createFromNonce($nonce, $pbAcc);


		$this->assertEquals($testMosaicId->equals($testMosaicId2), true );

		$nonce = MosaicNonce::createFromHex("00000001");
		$testMosaicId2 = MosaicId::createFromNonce($nonce, $pbAcc);

		$this->assertEquals($testMosaicId->equals($testMosaicId2), false);

	}

}