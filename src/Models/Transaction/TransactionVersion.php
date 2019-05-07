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
    public static TRANSFER = 3;

    /**
     * Register namespace transaction version.
     * @type {number}
     */
    public static REGISTER_NAMESPACE = 2;

    /**
     * Mosaic definition transaction version.
     * @type {number}
     */
    public static MOSAIC_DEFINITION = 3;

    /**
     * Mosaic supply change transaction.
     * @type {number}
     */
    public static MOSAIC_SUPPLY_CHANGE = 2;

    /**
     * Modify multisig account transaction version.
     * @type {number}
     */
    public static MODIFY_MULTISIG_ACCOUNT = 3;

    /**
     * Aggregate complete transaction version.
     * @type {number}
     */
    public static AGGREGATE_COMPLETE = 2;

    /**
     * Aggregate bonded transaction version
     */
    public static AGGREGATE_BONDED = 2;

    /**
     * Lock transaction version
     * @type {number}
     */
    public static LOCK = 1;

    /**
     * Secret Lock transaction version
     * @type {number}
     */
    public static SECRET_LOCK = 1;

    /**
     * Secret Proof transaction version
     * @type {number}
     */
    public static SECRET_PROOF = 1;

    /**
     * Address Alias transaction version
     * @type {number}
     */
    public static ADDRESS_ALIAS = 1;

    /**
     * Mosaic Alias transaction version
     * @type {number}
     */
    public static MOSAIC_ALIAS = 1;

    /**
     * Account Property address transaction version
     * @type {number}
     */
    public static MODIFY_ACCOUNT_PROPERTY_ADDRESS = 1;

    /**
     * Account Property mosaic transaction version
     * @type {number}
     */
    public static MODIFY_ACCOUNT_PROPERTY_MOSAIC = 1;

    /**
     * Account Property entity type transaction version
     * @type {number}
     */
    public static MODIFY_ACCOUNT_PROPERTY_ENTITY_TYPE = 1;

    /**
     * Link account transaction version
     * @type {number}
     */
    public static LINK_ACCOUNT = 2;
}