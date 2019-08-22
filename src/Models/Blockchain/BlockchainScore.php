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

}



