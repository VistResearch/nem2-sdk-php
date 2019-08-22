<?php 

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;

class TransactionBuffer{
	const NULL_SENTINEL = 0xffffffff;
	public $data;

	function __construct(){
		$this->data = [];
	}

	// Type 
	public function addType(int $type){
		$this->data["Type"] = SerializeBase::serializeUInt16($type,true);
	}

	// Type 
	public function addSize(int $size){
		$this->data["Size"] = SerializeBase::serializeUInt32($size,true);
	}

	// int of version as input
	public function addVersion(int $version){
		$this->data["Version"] = SerializeBase::serializeUInt16($version,true);
	}

	// Need Uint64 DTO Array as input
	public function addDeadline(Array $Deadline){
		$this->data["Deadline"] = SerializeBase::serializeUInt64($Deadline,true);
	}

	// Need Uint64 DTO Array as input
	public function addFee(Array $Fee){
		$this->data["Fee"] = SerializeBase::serializeUInt64($Fee);
	}


	// Need Array as input
	public function addSigner($singer){
		if ($singer == ""){
			$singer = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		}
		else if (sizeof($singer) != 32){
			print("Invalid Signer size\n");
			
		}
		$this->data["Signer"] = $singer;
	}

	public function addSignature($signature){
		if ($signature == ""){
			$signature = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		}
		else if(sizeof($signature) != 64){
			print("Invalid Signature size\n");
		}
		$this->data["Signature"] = $signature;
		
	}
}