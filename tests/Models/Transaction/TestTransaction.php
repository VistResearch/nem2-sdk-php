<?php

namespace NEM\Tests\Models\Transaction;

use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\PlainMessage;
use NEM\Models\Mosaic\Mosaic;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Account\Address;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Account\Account;
use NEM\Core\Format\Convert;
use NEM\Models\UInt64;

class TestTransaction{

	const prkey = '8D31B712AB28D49591EAF5066E9E967B44507FC19C3D54D742F7B3A255CFF4AB';
	const pbkey = '53C659B47C176A70EB228DE5C0A0FF391282C96640C2A42CD5BBD0982176AB1B';
	const addr_sha3 = "SADLWHZJZUF44O7JRBEL6J3ZMPZNAQBEQDWT2TTF";
	const addr_keccak = "SDFRR7YFAEYME3CKZFWV775HFKGD6MEVYZ4ZDMV6";

	const prkey2 = '15923F9D2FFFB11D771818E1F7D7DDCD363913933264D58533CB3A5DD2DAA66A';
	const pbkey2 = '3FE4A1AA148F5E76891CE924F5DC05627A87047B2B4AD9242C09C0ECED9B2338'; 
	const addr2_sha3 = "SDOJYZGMZGQXSZSOHNPXFTLGELE3K6GTSMOUCLGA";
	const addr2_keccak = "SD5VCXSQGVHSMU4SPKJ5Y7BSJYVVSOFXQ6KS5QRQ";

	static function staticDeadline(): Deadline{
		return Deadline::createFromDTO([0, 0]);
	}

	static function staticAddress(string $signSchema = "SHA3"): Address{
		return Address::createFromPublicKey(TestTransaction::pbkey,NetworkType::MIJIN_TEST,$signSchema);
	}

	static function staticMosaic(): Mosaic{
		$TestMosaicId = new MosaicId([3294802500, 2243684972]);
		return Mosaic($TestMosaicId, UInt64::fromUint(1));
	}

	static function staticFee(): UInt64{
		return UInt64::fromUint(1);
	}

	public function verify(){

	}
}