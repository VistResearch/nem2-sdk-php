<?php

namespace NEM\Models\Transaction;

use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;


class TransactionStatus {

    /**
     * @param group
     * @param status
     * @param hash
     * @param deadline
     * @param height
     */
    public $group;
    public $status;
    public $hash;
    public $deadline;
    public $height;
    function __construct(
                /**
                 * The transaction status group "failed", "unconfirmed", "confirmed", etc...
                 */
                string $group,
                /**
                 * The transaction status being the error name in case of failure and success otherwise.
                 */
                string $status,
                /**
                 * The transaction hash.
                 */
                string $hash,
                /**
                 * The transaction deadline.
                 */
                Deadline $deadline = null,
                /**
                 * The height of the block at which it was confirmed or rejected.
                 */
                UInt64 $height = null) {
    	$this->group = $group;
    	$this->status = $status;
    	$this->hash = $hash;
    	$this->deadline = $deadline;


    }
}