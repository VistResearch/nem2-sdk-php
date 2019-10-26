<?php


use PHPUnit\Framework\TestCase;

use NEM\Core\Keypair;
use NEM\Tests\TestInfo;


class KeypairTest extends TestCase{

	public function test(){
		$kp = KeyPair::createKeyPairFromPrivateKeyString(TestInfo::privateKey);

		$this->assertEquals($kp instanceof KeyPair, true);
		$this->assertEquals($kp->getPublicKey(),TestInfo::publicKey);
		$this->assertEquals($kp->getPrivateKey(),TestInfo::privateKey);

		$testStr = "test string";
		$signData = KeyPair::signData($testStr, $kp);
		$this->assertEquals(strlen($signData),128);
		$this->assertEquals(KeyPair::verify($signData, $testStr, $kp->getPublicKey()),true);

		$this->assertEquals(KeyPair::privatekeyToPublickey(TestInfo::privateKey), TestInfo::publicKey);

	}
}