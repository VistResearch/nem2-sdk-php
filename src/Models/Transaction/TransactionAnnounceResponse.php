<?php

namespace NEM\Models\Transaction;

/**
 * Transaction response of an announce transaction
 */

class TransactionAnnounceResponse {

    /**
     * @internal
     * @param message
     */

    public $message;

    function __construct(
                /**
                 * The success or error message.
                 */
                string $message) {

        $this->message = $message;

    }
}