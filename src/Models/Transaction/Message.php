<?php

namespace NEM\Models\Transaction;

class Message{

	public $type; //number
	public $payload; //string

	function __construct(			
                $type, //Message type
                string $payload // Message payload
            	){
		$this->type = $type;
		$this->payload = $payload;
	}
	
	static function decodeHex(string $hex):string{
		$returnValue = "";
		for ($i = 0; $i < strlen($hex); $i += 2){
			$st = substr($hex, $i,2);
			$st = "&#x" . $st . ";";
			$returnValue .= html_entity_decode($st, ENT_COMPAT, 'UTF-8');
		}
		return $returnValue;
	}

	public function toDTO(): Array{
		return ["type" => $this->type,
				"payload" => $this->payload ];
	}
}
