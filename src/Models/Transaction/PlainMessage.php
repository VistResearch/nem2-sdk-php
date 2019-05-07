<?php

namespace NEM\Models\Transaction;

use NEM\Models\Transaction\Message;
use NEM\Models\Transaction\MessageType;

class PlainMessage extends Message {
    /**
     * Create plain message object.
     * @returns PlainMessage
     */
    public static function create(string $message): PlainMessage {
        return new PlainMessage($message);
    }

    /**
     * @internal
     */
    public static function createFromPayload(string $payload): PlainMessage {
        return new PlainMessage($this->decodeHex($payload));
    }

    /**
     * @internal
     * @param payload
     */
    private function __construct(string $payload) {
        parent::__construct(MessageType::PlainMessage, $payload);
    }

}

/**
 * Plain message containing an empty string
 * @type {PlainMessage}
 */
// const EmptyMessage = PlainMessage::create('');