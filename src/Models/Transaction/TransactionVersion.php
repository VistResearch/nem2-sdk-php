<?php

namespace NEM\Models\Transaction;


/**
 * Static class containing transaction version constants.
 *
 * Transaction format versions are defined in catapult-server in
 * each transaction's plugin source code.
 *
 * In [catapult-server](https://github.com/nemtech/catapult-server), the `DEFINE_TRANSACTION_CONSTANTS` macro
 * is used to define the `TYPE` and `VERSION` of the transaction format.
 *
 * @see https://github.com/nemtech/catapult-server/blob/master/plugins/txes/transfer/src/model/TransferTransaction.h#L37
 */

class TransactionVersion {


    /**
     * Transfer Transaction transaction version.
     * @type {number}
     */
    const TRANSFER = 0x01;

    /**
     * Register namespace transaction version.
     * @type {number}
     */
    const REGISTER_NAMESPACE = 0x01;

    /**
     * Mosaic definition transaction version.
     * @type {number}
     */
    const MOSAIC_DEFINITION = 0x01;

    /**
     * Mosaic supply change transaction.
     * @type {number}
     */
    const MOSAIC_SUPPLY_CHANGE = 0x01;

    /**
     * Modify multisig account transaction version.
     * @type {number}
     */
    const MODIFY_MULTISIG_ACCOUNT = 0x01;

    /**
     * Aggregate complete transaction version.
     * @type {number}
     */
    const AGGREGATE_COMPLETE = 0x01;

    /**
     * Aggregate bonded transaction version
     */
    const AGGREGATE_BONDED = 0x01;

    /**
     * Lock transaction version
     * @type {number}
     */
    const LOCK = 0x01;

    /**
     * Secret Lock transaction version
     * @type {number}
     */
    const SECRET_LOCK = 0x01;

    /**
     * Secret Proof transaction version
     * @type {number}
     */
    const SECRET_PROOF = 0x01;

    /**
     * Address Alias transaction version
     * @type {number}
     */
    const ADDRESS_ALIAS = 0x01;

    /**
     * Mosaic Alias transaction version
     * @type {number}
     */
    const MOSAIC_ALIAS = 0x01;

    /**
     * Mosaic global restriction transaction version
     * @type {number}
     */
    const MOSAIC_GLOBAL_RESTRICTION = 0x01;

    /**
     * Mosaic address restriction transaction version
     * @type {number}
     */
    const MOSAIC_ADDRESS_RESTRICTION = 0x01;

    /**
     * Account Restriction address transaction version
     * @type {number}
     */
    const MODIFY_ACCOUNT_RESTRICTION_ADDRESS = 0x01;

    /**
     * Account Restriction mosaic transaction version
     * @type {number}
     */
    const MODIFY_ACCOUNT_RESTRICTION_MOSAIC = 0x01;

    /**
     * Account Restriction operation transaction version
     * @type {number}
     */
    const MODIFY_ACCOUNT_RESTRICTION_ENTITY_TYPE = 0x01;

    /**
     * Link account transaction version
     * @type {number}
     */
    const LINK_ACCOUNT = 0x01;
}