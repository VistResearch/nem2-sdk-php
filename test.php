<?php


require 'vendor/autoload.php';


$a = NEM\Models\Transaction\TransactionType::TRANSFER;
print_r($a);

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
