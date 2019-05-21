<?php


require 'vendor/autoload.php';
use NEM\util\Base32;

use NEM\Models\Mosaic\MosaicNonce;

// $a = NEM\Core\SerializeBase::serializeString("我");
// print_r($a);
// $a = Base32::decode("SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3","array");
// VAR_DUMP($a);

// $a = $a % 256;
// var_dump(unpack("C*",hex2bin("b4f12e7c9f6946091e2cb8b6d3a12b50d17ccbbf646386ea27ce2946a7423dcf")));
$nonce = MosaicNonce::createFromHex("00000000");
$pbkey = "7D08373CFFE4154E129E04F0827E5F3D6907587E348757B0F87D2F839BF88246";
$a = unpack("C*",hex2bin($pbkey) );

$data = array_merge($nonce->nonce ,  $a);
// var_dump(pack("C*" , ...$data));
// var_dump(pack("C*" , ...[49,50,51]));
// print( pack("C*" , [49]) 	."\n");
$hash = hash('sha3-256', pack("C*" , ...$data));
print($hash."\n");
// $hash = hash_init ('sha3-256');
// hash_update($hash,pack("C*" , ...$nonce->nonce));
// hash_update($hash,pack("C*" , ...$a));
// print(hash_final($hash)."\n");
// print(substr($hash,0,16)."\n");
$a = unpack("H*", strrev(pack("H*", substr($hash,0,16))));
// var_dump($a);
$f = hexdec($a[1]);
$aa = [($f >> 24) & 0xff,
	($f >> 16) & 0xff,
	($f >> 8) & 0xff,
	($f >> 0) & 0xff];
var_dump(unpack('C*',"QAQ"));
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
