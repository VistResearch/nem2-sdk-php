<?php

namespace NEM\Models\Blockchain;

class BlockchainScore{
    public $numBlocks; // int;
    public $numTransactions; // int;
    public $numAccounts; // int


    function __construct(int $numBlocks, int $numTransactions, int $numAccounts){
	    $this->numBlocks = $numBlocks; 
	    $this->numTransactions = $numTransactions;
        $this->numAccounts = $numAccounts;
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



