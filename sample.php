<?php
require 'vendor/autoload.php';

use NEM\Models\Transaction\TransferTransaction;
use NEM\Models\Transaction\Deadline as Deadline;
use NEM\Models\UInt64;
use NEM\Models\Transaction\PlainMessage;
use NEM\Models\Mosaic\Mosaic;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Account\Address;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Account\Account;

$prkey = '8D31B712AB28D49591EAF5066E9E967B44507FC19C3D54D742F7B3A255CFF4AB';
$generationHash = '57F7DA205008026C776CB6AED843393F04CD458E0AA2D9F1D5F31A402072B2D6';

$sampleDeadline = Deadline::createFromDTO([0, 0]);
$sampleAddress= Address::createFromRawAddress("NB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3");
$sampleMosaicId = new MosaicId([3294802500, 2243684972]);
$sampleMosaic = new Mosaic($sampleMosaicId, UInt64::fromUint(2));
$sampleMessage = PlainMessage::create('sample message');
$sampleTx = TransferTransaction::create($sampleDeadline,$sampleAddress,[$sampleMosaic],$sampleMessage,NetworkType::MIJIN_TEST);

$sampleAccount = Account::createFromPrivateKey($prkey,NetworkType::MIJIN_TEST,"SHA3");
var_dump($sampleTx->signWith($sampleAccount,$generationHash));



