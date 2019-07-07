<?php


require 'vendor/autoload.php';
use kornrunner\Keccak as Keccak;



// use NEM\Core\Format\RawAddress as A;
$char1 = "bb2e12344321ababaa";
$ar = [80,81,82,83,84,85];
var_dump(pack("C*", ...$ar));
$arr = [3140358708,1127590827,2852126720];
// hex2bin($char1);
// print(Keccak::hash(hex2bin($char1), 256));
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
