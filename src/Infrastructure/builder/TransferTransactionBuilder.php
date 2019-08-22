<?php

namespace NEM\Infrastructure;

class TransferTransactionBuilder{
	private $buffer;
	function __construct(){
		$this->buffer = [];
	}

	public function addDeadline(Array $data){
		$this->Deadline = $data;
	}

	public function addFee(Array $data){
		$this->Fee = $data;
	}

	public function addVersion(Array $data){
		$this->Version = $data;
	}

	public
}