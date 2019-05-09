<?php

namespace NEM\Models\Transaction;

/**
 * Static class containing transaction type constants.
 */
class TransactionType {

    /**
     * Transfer Transaction transaction type.
     * @type {number}
     */
    const TRANSFER = 0x4154;

    /**
     * Register namespace transaction type.
     * @type {number}
     */
    const REGISTER_NAMESPACE = 0x414E;

    /**
     * Address alias transaction type
     * @type {number}
     */
    const ADDRESS_ALIAS = 0x424E;

    /**
     * Mosaic alias transaction type
     * @type {number}
     */
    const MOSAIC_ALIAS = 0x434E;

    /**
     * Mosaic definition transaction type.
     * @type {number}
     */
    const MOSAIC_DEFINITION = 0x414D;

    /**
     * Mosaic supply change transaction.
     * @type {number}
     */
    const MOSAIC_SUPPLY_CHANGE = 0x424D;

    /**
     * Modify multisig account transaction type.
     * @type {number}
     */
    const MODIFY_MULTISIG_ACCOUNT = 0x4155;

    /**
     * Aggregate complete transaction type.
     * @type {number}
     */
    const AGGREGATE_COMPLETE = 0x4141;

    /**
     * Aggregate bonded transaction type
     */
    const AGGREGATE_BONDED = 0x4241;

    /**
     * Lock transaction type
     * @type {number}
     */
    const LOCK = 0x4148;

    /**
     * Secret Lock Transaction type
     * @type {number}
     */
    const SECRET_LOCK = 0x4152;

    /**
     * Secret Proof transaction type
     * @type {number}
     */
    const SECRET_PROOF = 0x4252;

    /**
     * Account property address transaction type
     * @type {number}
     */
    const MODIFY_ACCOUNT_PROPERTY_ADDRESS = 0x4150;

    /**
     * Account property mosaic transaction type
     * @type {number}
     */
    const MODIFY_ACCOUNT_PROPERTY_MOSAIC = 0x4250;

    /**
     * Account property entity type transaction type
     * @type {number}
     */
    const MODIFY_ACCOUNT_PROPERTY_ENTITY_TYPE = 0x4350;

    /**
     * Link account transaction type
     * @type {number}
     */
    const LINK_ACCOUNT = 0x414C;
}