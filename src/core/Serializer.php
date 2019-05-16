<?php

namespace NEM\Core;

use NEM\Core\SerializeBase;
use NEM\util\Base32;

class Serializer{
	// All method return a list of int between 0 ~ 255
	const NULL_SENTINEL = 0xffffffff;

	private $data;

	function __construct(){
		$this->data = [];
	}

	// Need Uint64 DTO Array as input
	public function addDeadline(Array $Dearline){
		$this->data.setAttribute("Deadline",SerializeBase::serializeUInt8($Deadline));
	}

	// Need Uint64 DTO Array as input
	public function addFee(Array $Fee){
		$this->data.setAttribute("Fee",SerializeBase::serializeUInt8($Fee));
	}

	// address as plain, ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3
	public function addRecipient(string $Address){
		$this->data.setAttribute("Recipient",Base32::decode($Address,"array"));
	}

	public function 

}