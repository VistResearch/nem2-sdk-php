<?php
/**
 * BlockDTO
 *
 * PHP version 5
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Catapult REST Endpoints
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 0.7.19
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.0.3
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * BlockDTO Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class BlockDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BlockDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'signature' => 'string',
        'signer_public_key' => 'string',
        'version' => 'int',
        'type' => 'int',
        'height' => 'string',
        'timestamp' => 'string',
        'difficulty' => 'string',
        'fee_multiplier' => 'int',
        'previous_block_hash' => 'string',
        'transactions_hash' => 'string',
        'receipts_hash' => 'string',
        'state_hash' => 'string',
        'beneficiary_public_key' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'signature' => null,
        'signer_public_key' => null,
        'version' => 'int32',
        'type' => 'int32',
        'height' => null,
        'timestamp' => null,
        'difficulty' => null,
        'fee_multiplier' => 'int32',
        'previous_block_hash' => null,
        'transactions_hash' => null,
        'receipts_hash' => null,
        'state_hash' => null,
        'beneficiary_public_key' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'signature' => 'signature',
        'signer_public_key' => 'signerPublicKey',
        'version' => 'version',
        'type' => 'type',
        'height' => 'height',
        'timestamp' => 'timestamp',
        'difficulty' => 'difficulty',
        'fee_multiplier' => 'feeMultiplier',
        'previous_block_hash' => 'previousBlockHash',
        'transactions_hash' => 'transactionsHash',
        'receipts_hash' => 'receiptsHash',
        'state_hash' => 'stateHash',
        'beneficiary_public_key' => 'beneficiaryPublicKey'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'signature' => 'setSignature',
        'signer_public_key' => 'setSignerPublicKey',
        'version' => 'setVersion',
        'type' => 'setType',
        'height' => 'setHeight',
        'timestamp' => 'setTimestamp',
        'difficulty' => 'setDifficulty',
        'fee_multiplier' => 'setFeeMultiplier',
        'previous_block_hash' => 'setPreviousBlockHash',
        'transactions_hash' => 'setTransactionsHash',
        'receipts_hash' => 'setReceiptsHash',
        'state_hash' => 'setStateHash',
        'beneficiary_public_key' => 'setBeneficiaryPublicKey'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'signature' => 'getSignature',
        'signer_public_key' => 'getSignerPublicKey',
        'version' => 'getVersion',
        'type' => 'getType',
        'height' => 'getHeight',
        'timestamp' => 'getTimestamp',
        'difficulty' => 'getDifficulty',
        'fee_multiplier' => 'getFeeMultiplier',
        'previous_block_hash' => 'getPreviousBlockHash',
        'transactions_hash' => 'getTransactionsHash',
        'receipts_hash' => 'getReceiptsHash',
        'state_hash' => 'getStateHash',
        'beneficiary_public_key' => 'getBeneficiaryPublicKey'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['signature'] = isset($data['signature']) ? $data['signature'] : null;
        $this->container['signer_public_key'] = isset($data['signer_public_key']) ? $data['signer_public_key'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['height'] = isset($data['height']) ? $data['height'] : null;
        $this->container['timestamp'] = isset($data['timestamp']) ? $data['timestamp'] : null;
        $this->container['difficulty'] = isset($data['difficulty']) ? $data['difficulty'] : null;
        $this->container['fee_multiplier'] = isset($data['fee_multiplier']) ? $data['fee_multiplier'] : null;
        $this->container['previous_block_hash'] = isset($data['previous_block_hash']) ? $data['previous_block_hash'] : null;
        $this->container['transactions_hash'] = isset($data['transactions_hash']) ? $data['transactions_hash'] : null;
        $this->container['receipts_hash'] = isset($data['receipts_hash']) ? $data['receipts_hash'] : null;
        $this->container['state_hash'] = isset($data['state_hash']) ? $data['state_hash'] : null;
        $this->container['beneficiary_public_key'] = isset($data['beneficiary_public_key']) ? $data['beneficiary_public_key'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['signature'] === null) {
            $invalidProperties[] = "'signature' can't be null";
        }
        if ($this->container['signer_public_key'] === null) {
            $invalidProperties[] = "'signer_public_key' can't be null";
        }
        if ($this->container['version'] === null) {
            $invalidProperties[] = "'version' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['height'] === null) {
            $invalidProperties[] = "'height' can't be null";
        }
        if ($this->container['timestamp'] === null) {
            $invalidProperties[] = "'timestamp' can't be null";
        }
        if ($this->container['difficulty'] === null) {
            $invalidProperties[] = "'difficulty' can't be null";
        }
        if ($this->container['fee_multiplier'] === null) {
            $invalidProperties[] = "'fee_multiplier' can't be null";
        }
        if ($this->container['previous_block_hash'] === null) {
            $invalidProperties[] = "'previous_block_hash' can't be null";
        }
        if ($this->container['transactions_hash'] === null) {
            $invalidProperties[] = "'transactions_hash' can't be null";
        }
        if ($this->container['receipts_hash'] === null) {
            $invalidProperties[] = "'receipts_hash' can't be null";
        }
        if ($this->container['state_hash'] === null) {
            $invalidProperties[] = "'state_hash' can't be null";
        }
        if ($this->container['beneficiary_public_key'] === null) {
            $invalidProperties[] = "'beneficiary_public_key' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->container['signature'];
    }

    /**
     * Sets signature
     *
     * @param string $signature Entity's signature generated by the signer.
     *
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->container['signature'] = $signature;

        return $this;
    }

    /**
     * Gets signer_public_key
     *
     * @return string
     */
    public function getSignerPublicKey()
    {
        return $this->container['signer_public_key'];
    }

    /**
     * Sets signer_public_key
     *
     * @param string $signer_public_key signer_public_key
     *
     * @return $this
     */
    public function setSignerPublicKey($signer_public_key)
    {
        $this->container['signer_public_key'] = $signer_public_key;

        return $this;
    }

    /**
     * Gets version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param int $version Entity version. The higher byte represents the network identifier: * 0x68 (MAIN_NET) - Public main network. * 0x98 (TEST_NET) - Public test network. * 0x60 (MIJIN) - Private network. * 0x90 (MIJIN_TEST) - Private test network.
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

        return $this;
    }

    /**
     * Gets type
     *
     * @return int
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param int $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->container['height'];
    }

    /**
     * Sets height
     *
     * @param string $height Height of the blockchain.
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->container['height'] = $height;

        return $this;
    }

    /**
     * Gets timestamp
     *
     * @return string
     */
    public function getTimestamp()
    {
        return $this->container['timestamp'];
    }

    /**
     * Sets timestamp
     *
     * @param string $timestamp Number of seconds elapsed since the creation of the nemesis block.
     *
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->container['timestamp'] = $timestamp;

        return $this;
    }

    /**
     * Gets difficulty
     *
     * @return string
     */
    public function getDifficulty()
    {
        return $this->container['difficulty'];
    }

    /**
     * Sets difficulty
     *
     * @param string $difficulty Defines how difficult it will be to harvest next the block, based on previous blocks.
     *
     * @return $this
     */
    public function setDifficulty($difficulty)
    {
        $this->container['difficulty'] = $difficulty;

        return $this;
    }

    /**
     * Gets fee_multiplier
     *
     * @return int
     */
    public function getFeeMultiplier()
    {
        return $this->container['fee_multiplier'];
    }

    /**
     * Sets fee_multiplier
     *
     * @param int $fee_multiplier Fee multiplier applied to transactions contained in block.
     *
     * @return $this
     */
    public function setFeeMultiplier($fee_multiplier)
    {
        $this->container['fee_multiplier'] = $fee_multiplier;

        return $this;
    }

    /**
     * Gets previous_block_hash
     *
     * @return string
     */
    public function getPreviousBlockHash()
    {
        return $this->container['previous_block_hash'];
    }

    /**
     * Sets previous_block_hash
     *
     * @param string $previous_block_hash previous_block_hash
     *
     * @return $this
     */
    public function setPreviousBlockHash($previous_block_hash)
    {
        $this->container['previous_block_hash'] = $previous_block_hash;

        return $this;
    }

    /**
     * Gets transactions_hash
     *
     * @return string
     */
    public function getTransactionsHash()
    {
        return $this->container['transactions_hash'];
    }

    /**
     * Sets transactions_hash
     *
     * @param string $transactions_hash transactions_hash
     *
     * @return $this
     */
    public function setTransactionsHash($transactions_hash)
    {
        $this->container['transactions_hash'] = $transactions_hash;

        return $this;
    }

    /**
     * Gets receipts_hash
     *
     * @return string
     */
    public function getReceiptsHash()
    {
        return $this->container['receipts_hash'];
    }

    /**
     * Sets receipts_hash
     *
     * @param string $receipts_hash receipts_hash
     *
     * @return $this
     */
    public function setReceiptsHash($receipts_hash)
    {
        $this->container['receipts_hash'] = $receipts_hash;

        return $this;
    }

    /**
     * Gets state_hash
     *
     * @return string
     */
    public function getStateHash()
    {
        return $this->container['state_hash'];
    }

    /**
     * Sets state_hash
     *
     * @param string $state_hash state_hash
     *
     * @return $this
     */
    public function setStateHash($state_hash)
    {
        $this->container['state_hash'] = $state_hash;

        return $this;
    }

    /**
     * Gets beneficiary_public_key
     *
     * @return string
     */
    public function getBeneficiaryPublicKey()
    {
        return $this->container['beneficiary_public_key'];
    }

    /**
     * Sets beneficiary_public_key
     *
     * @param string $beneficiary_public_key beneficiary_public_key
     *
     * @return $this
     */
    public function setBeneficiaryPublicKey($beneficiary_public_key)
    {
        $this->container['beneficiary_public_key'] = $beneficiary_public_key;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


