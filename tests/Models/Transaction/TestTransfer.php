<?php

namespace NEM\Tests\Models\Transaction;

use NEM\Tests\Models\Transaction\TestTransaction;
use NEM\Models\Transaction\TransferTransaction;
use NEM\Models\Transaction\PlainMessage;
use NEM\Models\Account\Address;
use NEM\Models\Mosaic\NetworkCurrencyMosaic;


class TestTransfer extends TestTransaction{
	const type = "Transfer Transaction ";
	const generationHash = '57F7DA205008026C776CB6AED843393F04CD458E0AA2D9F1D5F31A402072B2D6';

	static function test(){
		$returnValue = true;

		$deadline = TestTransaction::staticDeadline();
		// $address = TestTransaction::staticAddress();
		// $address_Keccak = TestTransaction::staticAddress($signSchema = "Keccak");
		$address_raw = Address::createFromRawAddress('SBILTA367K2LX2FEXG5TFWAS7GEFYAGY7QLFBYKC');
		$Fee = TestTransaction::staticFee(1);
		$Mosaics = NetworkCurrencyMosaic::createRelative(100);
		$PlainMessage = PlainMessage::create('test-message');
		$networkType = TestTransaction::NetworkType();

		$tx = TransferTransaction::create($deadline,$address_raw,[$Mosaics],$PlainMessage,$networkType);

		if(!($tx->maxFee->higher === 0 && $tx->maxFee->lower === 0)){
			print(self::type."error : Defaut fee should be 0\n");
			$returnValue = false;
		}

		$tx = TransferTransaction::create($deadline,$address_raw,[$Mosaics],$PlainMessage,$networkType,$Fee);

		if(!($tx->maxFee->higher === 0 && $tx->maxFee->lower === 1)){
			print(self::type."error : Fee should be override\n");
			$returnValue = false;
		}

		$tx = TransferTransaction::create($deadline,$address_raw,[],$PlainMessage,$networkType);

		if($tx->message->payload !== "test-message"
			|| sizeof($tx->mosaics) !== 0
			|| !($tx->recipient instanceof Address)
		){
			print(self::type."error : tx with message error\n");
			$returnValue = false;
		}

		$signedTx = $tx->signWith(TestTransaction::TestingAccount(),self::generationHash);

		if(mb_strtoupper(substr($signedTx->payload, 240)) !== "9050B9837EFAB4BBE8A4B9BB32D812F9885C00D8FC1650E1420D000000746573742D6D657373616765"){
			print(self::type."error : sign error\n");
			$returnValue = false;
		}

		$tx = TransferTransaction::create($deadline,$address_raw,[$Mosaics],$PlainMessage,$networkType);
	}
}