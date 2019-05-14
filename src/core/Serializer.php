<?php

namespace NEM\Core;

use NEM\Core\SerializeBase;

class Serializer{
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

	public function addAddress(string $Address){
		// 'TODO'
	}


}