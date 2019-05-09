<?php

namespace NEM\Models\Transaction;

use NEM\Models\Transaciotn\Deadline;

class TransactionStatusError {

    /**
     * @internal
     * @param hash
     * @param status
     * @param deadline
     */
    
    public $hash; // string
    public $status; // string
    public $deadline; //Deadline

    function __construct(
                /**
                 * The transaction hash.
                 */
                string $hash,
                /**
                 * The status error message.
                 */
                string $status,
                /**
                 * The transaction deadline.
                 */
                Deadline $deadline) {
    	$this->hash = $hash;
    	$this->status = $status;
    	$this->deadline = $Deadline;

    }
}