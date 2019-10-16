<?php


require 'vendor/autoload.php';
use kornrunner\Keccak as Keccak;

use NEM\Core\Format\Convert as Convert;

use NEM\Core\KeyPair as KeyPair;

use NEM\Models\Transaction\TransferTransaction;

use NEM\Models\Transaction\Deadline as Deadline;
use NEM\Models\UInt64;
use NEM\Models\Transaction\PlainMessage;
use NEM\Models\Mosaic\Mosaic;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Account\Address;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Account\Account;
use NEM\Core\Identifier;


use NEM\Tests\Models\Transaction\TestTransfer;
use NEM\Tests\Models\Transaction\TestTransaction;

use NEM\Tests\Models\Account\PublicAccountTest;

try{
	$a = PublicAccountTest::test();
}
catch(Exception $e){
	echo 'Caught exception: '.  $e->getMessage(). "\n";
}

$prkey = '8D31B712AB28D49591EAF5066E9E967B44507FC19C3D54D742F7B3A255CFF4AB';
$pbkey = '53C659B47C176A70EB228DE5C0A0FF391282C96640C2A42CD5BBD0982176AB1B';

$prkey2 = '15923F9D2FFFB11D771818E1F7D7DDCD363913933264D58533CB3A5DD2DAA66A';
$pbkey2 = '3FE4A1AA148F5E76891CE924F5DC05627A87047B2B4AD9242C09C0ECED9B2338'; 

$saltStr = "0000000000000000000000000000000000000000000000000000000000000000";
$generationHash = '57F7DA205008026C776CB6AED843393F04CD458E0AA2D9F1D5F31A402072B2D6';






// $aa = $char1->signData("00");
// var_dump();
// var_dump($char1->getPublicKey());
// print(TransactionStatus::test());
// $D = Deadline::createFromDTO([0, 0]);
// $AD = Address::createFromRawAddress("NB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3");
// $MM = new MosaicId([3294802500, 2243684972]);
// $M = new Mosaic($MM, UInt64::fromUint(2));
// $P = PlainMessage::create('112345678975432q345678975432456786o57i64uehrgfhj2e4rfwegdsbfd23');
// // var_dump($D->toDTO());s
// $a = TransferTransaction::create($D,$AD,[$M],$P,NetworkType::MIJIN_TEST);
// // if($a instanceof TransferTransaction){
// // 	print("QQ\n");
// // }
// $arra = $a->serialize();
// // var_dump(Convert::uint8ToHex($arra));
// // for($i = 145; $i < sizeof($arra); $i += 1){
// // 	print($i." ".$arra[$i]."\n");
// // }
// // $hx = Convert::uint8ToHex($arra);
// // print($hx);

// $acc = Account::createFromPrivateKey($prkey,NetworkType::MIJIN_TEST,"SHA3");
// $a->signer = Convert::HexTouint8($acc->publicKey());

// $aa = $a->aggregateTransaction();
// // print(Convert::uint8ToHex($aa)."\n");
// // print_r(TestTransfer::Test());
// // print_r(TestTransaction::staticMosaic());
// print_r(Identifier::generateSubNamespaceId([0,0],"cat"));

// $a->build();
// $arr = [3140358708,1127590827,2852126720];
// hex2bin($char1);
// Convert::hexToUint8Reverse($sk)
// $sk = Convert::hexToUint8Reverse($sk);
// var_dump($sk);
// $sk = Convert::uint8ToHex($sk);
// call_user_func_array("pack", array_merge(array("C*"), $sk));
// var_dump($sk);
// $char1 = KeyPair::createFromPrivateKeyString($prkey);
// $a = KeyPair::deriveSharedKey($char1,$pbkey2,$saltStr);
// print("This is keccak pbkey\n");
// $o = KeyPair::signData("AA",$char1);
// print($o."\n");
// print(KeyPair::verify($o,"AA",$pbkey));

// $hs = hash_init('sha3-512');
// hash_update($hs, "QQ");
// hash_update($hs, "AA");
// $nonceHash = hash_final($hs);
// print($nonceHash."\n");

// print(hash('sha3-512',"QQAA"));

// $afterHash = Convert::hexToUint8(Keccak::hash($sk, 512));
// $afterHash[1] &= 248;
// $afterHash[32] &= 127;
// $afterHash[32] |= 64;
// print(strtoupper(Convert::uint8ToHex($afterHash)));


// Hash step
// $sk = "082a9e70d1ab588f6ad7b13ea71977b52ce03de0e7502358669b57fc03b18a45";
// $sk = Convert::hexToUint8Reverse($sk);
// $sk = call_user_func_array("pack", array_merge(array("C*"), $sk));
// $afterHash = Convert::hexToUint8(Keccak::hash($sk, 512));
// $afterHash[1] &= 248;
// $afterHash[32] &= 127;
// $afterHash[32] |= 64;





// $sha3_256bit = hash("keccak256","");
// print_r(A::uint8ToUint32($ar));
// print_r(A::hexToUint8($char1));
// $a = A::stringToAddress("SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3");
// print_r(A::addressToString($a));
// require './tests/Models/Account/AccountTest.php';
// $charMap = array_flip(str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ234567'));

// print_r($charMap);
// $a = A::Base32Decode("SB3KUBHA");
// print_r($a);
// $b = A::Base32Encode([144,118,170,4,224]);
// print($b);
// $a = Base32::decode("SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3","array");
// VAR_DUMP($a);

// $a = $a % 256;
// var_dump(unpack("C*",hex2bin("b4f12e7c9f6946091e2cb8b6d3a12b50d17ccbbf646386ea27ce2946a7423dcf")));
// $nonce = MosaicNonce::createFromHex("00000000");
// $pbkey = "7D08373CFFE4154E129E04F0827E5F3D6907587E348757B0F87D2F839BF88246";
// $a = unpack("h*",$pbkey);
// $a = unpack("C*",hex2bin($pbkey));
// var_dump($a);
// $data = array_merge($nonce->nonce ,  $a);
// // var_dump(pack("C*" , ...$data));
// // var_dump(pack("C*" , ...[49,50,51]));
// // print( pack("C*" , [49]) 	."\n");
// $hash = hash('sha3-256', pack("C*" , ...$data));
// print($hash."\n");
// // $hash = hash_init ('sha3-256');
// // hash_update($hash,pack("C*" , ...$nonce->nonce));
// // hash_update($hash,pack("C*" , ...$a));
// // print(hash_final($hash)."\n");
// // print(substr($hash,0,16)."\n");
// $a = unpack("H*", strrev(pack("H*", substr($hash,0,16))));
// // var_dump($a);
// $f = hexdec($a[1]);
// $aa = [($f >> 24) & 0xff,
// 	($f >> 16) & 0xff,
// 	($f >> 8) & 0xff,
// 	($f >> 0) & 0xff];
// var_dump(unpack('C*',"QAQ"));
// print(hexdec(substr($hash,0,16)) ."\n");
// $result = [hexdec($a),hexdec(substr($hash,16,16))];

// $result = [strrev($result[0]),strrev($result[1])];
// var_dump($result);
// print( hexdec($result[0]) , ( (hexdec($result[1]) & 0x7FFFFFFF ) << 32) );
// print((hexdec($result[1])& 0x7FFFFFFF).hexdec($result[0])."\n");
// var_dump([hexdec(substr($hash,16,16)), hexdec(substr($hash,0,16)) & 0x7FFFFFFF]);
// $t=time();;
// 3628785869151343404s
// echo($t . "\n"."1459468800"."\n");

// $a = NEM\util\Base32::decode("SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3");
// var_dump($a);

// print(strlen(hex2bin(unpack("H*", hex2bin("b4f12e7c9f6946091e2cb8b6d3a12b50d17ccbbf646386ea27ce2946a7423dcf"))[1])));

// print(PropertyModifica/tionType::Remove);
// $a = new EmptyAlias();
// $a = new AddressAlias(123,Address::createFromRawAddress("NB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3"));
// $i = "aaaaaaaa";
// $ii = unpack("C*",hex2bin($i));
// print(sizeof($ii)."\n");
// var_dump(unpack("C*", $ii));
// print($i."\n");
// // $j = Catbuffer::uInt64_encode($i);
// // $j = $j . $j . $j;
// $ii = unpack("C*", $i);
// var_dump($ii);
// // print($j."\n");
// var_dump(unpack("C*",pack("C", $i)));
// // print_r(Catbuffer::uInt64_decode($j)");
// print("---------------------\n");
// // if(is_int($i)){
// // 	print($i."\n");
// // }
// // $i = pow(3,35);
// // $ar = unpack("C*", pack("P", $i));
// // var_dump($ar);
// // var_dump(strlen(pack("P", $i)));
// // print(pack("P", $i)."\n\n");
// // print(gettype(pack("P", $i))."\n\n\n");

// $ad = Address::createFromRawAddress("NB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3");
// $aa = new PublicAccount("asd",$ad);
// // if($aa instanceof PublicAccount){
// // 	print("QQ\n\n");
// // }
// $aaa = $aa->toDTO();
// print_r($aaa);
// $bb = PublicAccount::fromDTO($aaa);
// // print_r($aa->equals($bb));

// $aa = ["a","b","c"];

// foreach ($aa as $value) {
// 	print($value."\n");
// }
