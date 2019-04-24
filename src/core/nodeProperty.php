<?php

include_once dirname(__FILE__)."\\Http.php";

class nodeProperty{
	protected $node; // the host we used as node
	protected $networkType; // main/mijin/test

	function __construct(string $node){
		return;
	}

	function __get($name) {
        if($name === "networkType" or $name === "node"){
            return $this->$name;
        }
        else{
 	       user_error("Invalid property: " . __CLASS__ . "->$name");
        }
    }

    function __set($name, $value) {
        user_error("Readonly property: " . __CLASS__ . "->$name");
    }

	public function setNode(string $node): bool{

		$this->node = $node;

		$HttpOb = new Http();
		$returnData = $HttpOb->requestNodeHeartBeat($this->node);

		// check if node on service
		if ($returnData == ""){
			// http ob should deal with this err
			return false;
		}
		if ($returnData->code == 0 ||$returnData->code == 1 || $returnData->code == 2 || $returnData->code == 8 ){
			throw new Exception('node not in service');
			return false;
		}

		// update networkType
		if (!$this->setNetworkType()){
			return false;
		}
		return false;
	}

	protected function setNetworkType(): bool{
		// update netWorkType as main/mijin/test
		$this->networkType = "";

		$returnValue = false;
		$HttpOb = new Http();
		$returnData = $HttpOb->requestNetWorkType($this->node);



		try{
			$this->networkType = $returnData;			
			$returnValue = true;
		}
		catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";

		}

		return $returnValue;
	}
}