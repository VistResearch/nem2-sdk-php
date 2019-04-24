<?php
class Http{
	protected $ch;
	
	function __construct(){
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'GET'); 
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

	}

	protected function runRequest(){
		// set url first !!!
		$data = curl_exec($this->ch);

		// reset url
		curl_setopt($this->ch, CURLOPT_URL, "");

		if ($data == ""){
			throw new Exception('http connect failed');
			return "";
		}
		return json_decode($data);
	}

	public function requestNetWorkType(string $node){
		$requestUrl = "http://" . $node . ":7890/chain/last-block";

		curl_setopt($this->ch, CURLOPT_URL, $requestUrl);

		$response = $this->runRequest();
		return $response->version;	
	}

	public function requestNodeHeartBeat(string $node){
		$requestUrl = "http://" . $node . ":7890/status";

		curl_setopt($this->ch, CURLOPT_URL, $requestUrl);

		return $this->runRequest();			
	}

	// public function 
}

