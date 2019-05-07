<?php

namespace NEM\Models\Transaction;

use NEM\Models\UInt64;

/**
 * The deadline of the transaction. The deadline is given as the number of seconds elapsed since the creation of the nemesis block.
 * If a transaction does not get included in a block before the deadline is reached, it is deleted.
 */
class Deadline {

    /**
     * @type {number}
     */
    public static timestampNemesisBlock = 1459468800;

    /**
     * Deadline value
     */
    public $value; // LocalDateTime;

    /**
     * Create deadline model
     * @param deadline
     * @param chronoUnit
     * @returns {Deadline}
     */
    public static function create(int $deadline): Deadline {
        $deadline = $deadline - Deadline::timestampNemesisBlock;

        if ($deadline <= 0) {
            throw new Error('deadline should be greater than 0');
        } else if ($deadline > 86400) {
            throw new Error('deadline should be less than 24 hours');
        }

        return new Deadline($deadline);
    }

    // /**
    //  * @internal
    //  * @param value
    //  * @returns {Deadline}
    //  */
    // public static createFromDTO(value: number[]): Deadline {
    //     const dateSeconds = (new UInt64(value)).compact();
    //     const deadline = LocalDateTime.ofInstant(
    //         Instant.ofEpochMilli(Math.round(dateSeconds + Deadline.timestampNemesisBlock * 1000)),
    //         ZoneId.SYSTEM);
    //     return new Deadline(deadline);
    // }

    /**
     * @param deadline
     */
    private function __construct($deadline: LocalDateTime) {
        $this->value = $deadline;
    }

    // /**
    //  * @internal
    //  */
    // public toDTO(): number[] {
    //     return UInt64.fromUint(
    //         (this.value.atZone(ZoneId.SYSTEM).toInstant().toEpochMilli() - Deadline.timestampNemesisBlock * 1000),
    //     ).toDTO();
    // }
}