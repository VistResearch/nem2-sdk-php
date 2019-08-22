<?php

namespace NEM\Models\Blockchain;

class BlockchainStorageInfo{
    public $numBlocks; // int;
    public $numTransactions; // int;
    public $numAccounts; // int


    function __construct(int $numBlocks, int $numTransactions, int $numAccounts){
	    $this->numBlocks = $numBlocks; 
	    $this->numTransactions = $numTransactions;
        $this->numAccounts = $numAccounts;
    }

}



