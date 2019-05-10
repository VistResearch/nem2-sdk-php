<?php

namespace NEM\Models\Transaciotn;

use NEM\Models\UInt64;
use NEM\Models\TransactionInfo;

class AggregateTransactionInfo extends TransactionInfo {

    public $aggregateHash;
    public $aggregateId;

    function __construct(UInt64 $height,
                int $index,
                strign $id,
                /**
                 * The hash of the aggregate transaction.
                 */
                string $aggregateHash,
                /**
                 * The id of the aggregate transaction.
                 */
                string $aggregateId) {

    	$this->aggregateHash = $aggregateHash;
    	$this->aggregateId = $aggregateId;

        parent::__construct($height, $index, $id);
    }
}