<?php

namespace NEM\Models\Transaction;

use NEM\Models\UInt64;

/**
 * The deadline of the transaction. The deadline is given as the number of seconds elapsed since the creation of the nemesis block.
 * If a transaction does not get included in a block before the deadline is reached, it is deleted.
 */
const timestampNemesisBlock = 1459468800;
class Deadline {

    /**
     * @type {number}
     */
    

    /**
     * Deadline value
     */
    public $value; // LocalDateTime;

    /**
     * Create deadline object from how long we can wait (in sec)
     * @param deadline
     * @param chronoUnit
     * @returns {Deadline}
     */
    public static function create(int $deadline = 7200): Deadline {
        if ($deadline <= 0) {
            throw new Error('deadline should be greater than 0');
        } else if ($deadline > 86400) {
            throw new Error('deadline should be less than 24 hours');
        }

        return new Deadline($deadline*1000 + round(microtime(true) * 1000) + 1000 * 3600);
    }

    // /**
    //  * @internal
    //  * @param value
    //  * @returns {Deadline}
    //  */
    public static function createFromDTO(Array $value): Deadline {
        $dateSeconds = (new UInt64($value))->compact() + timestampNemesisBlock * 1000;

        return new Deadline($dateSeconds);
    }

    /**
     * @param deadline
     */
    private function __construct(int $deadline) {
        $this->value = $deadline;
    }

    /**
     * @internal
     */
    public function toDTO(): Array {
        return UInt64::fromUint($this->value - timestampNemesisBlock*1000)->toDTO();
    }
}