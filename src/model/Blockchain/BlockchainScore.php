<?php

require_once dirname(__FILE__) ."\\..\\..\\innerLoader.php";

class BlockchainScore{
    public $scoreHigh; // UInt64;
    public $scoreLow; // UInt64;


    function __construct(UInt64 $scoreHigh, UInt64 $scoreLow){
	    $this->scoreHigh = $scoreHigh; 
	    $this->scoreLow = $scoreLow;
    }

    
    // public function toDTO(): Array {
    //     $nameList =  get_class_vars(get_class($this));
    //     $Dto = [];
    //     foreach ($nameList as $key => $value) {
    //         $Dto[$key] = $this->$key;
    //     }
    //     return $Dto;
    // }

    // public function FromDTO($DTOArray){
    //     foreach ($DTOArray as $key => $value) {
    //        $this->$key = $value;
    //     }
    //     return;
    // }


}



