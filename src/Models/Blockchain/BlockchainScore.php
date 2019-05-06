<?php

namespace NEM\Models\Blockchain;

use NEM\Models\UInt64;

class BlockchainScore{
    public $scoreHigh; // UInt64;
    public $scoreLow; // UInt64;


    function __construct(UInt64 $scoreHigh, UInt64 $scoreLow){
	    $this->scoreHigh = $scoreHigh; 
	    $this->scoreLow = $scoreLow;
    }

    static function forTest(){
        echo "string\n";
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



