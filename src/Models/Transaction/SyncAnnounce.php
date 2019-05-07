<?php

namespace NEM\Models\Transaction;

class SyncAnnounce {
    /**
     * @internal
     * @param payload
     * @param hash
     * @param address
     */

    public $payload;
    public $hash;
    public $address;
    function __construct(
        /**
         * Transaction serialized data
         */
        string $payload,
        /**
         * Transaction hash
         */
        string $hash,
        /**
         * Transaction address
         */
        string $address) {

        $this->payload = $payload;
        $this->hash = $hash;
        $this->address = $address;
    }
}