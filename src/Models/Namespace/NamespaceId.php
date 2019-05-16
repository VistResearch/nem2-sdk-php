<?php

namespace NEM\Models\Namespace;

use NEM\Models\Id;

class NamespaceId {

    /**
     * Namespace id
     */
    public $id; // Id;

    /**
     * Namespace full name
     */
    public $fullName;// ?: string;

    /**
     * Create NamespaceId from namespace string name (ex: nem or domain.subdom.subdome)
     * or id in form of array number (ex: [929036875, 2226345261])
     *
     * @param id
     */
    function __construct(Id $id) {
        if (is_array ($id)) {
            $this->id = new Id($id);
        } else if (is_string($id)) {
            $this->fullName = $id;
            throw new Exception("Not support yet\n");
            // $this->id = new Id(NamespaceIdGenerator($id));
        }
    }

    /**
     * Create a NamespaceId object from its encoded hexadecimal notation.
     * @param encoded
     * @returns {NamespaceId}
     */

    // java code : https://github.com/nemtech/nem2-sdk-java/blob/master/src/main/java/io/nem/sdk/model/transaction/IdGenerator.java
    // public static createFromEncoded(string $encoded): NamespaceId {
    //     const uint = convert.hexToUint8(encoded).reverse();
    //     const hex  = convert.uint8ToHex(uint);
    //     const namespace = new NamespaceId(Id.fromHex(hex).toDTO());
    //     return namespace;
    // }

    /**
     * Get string value of id
     * @returns {string}
     */
    public function toHex(): string {
        return $this->id->toHex();
    }

    /**
     * Compares namespaceIds for equality.
     *
     * @return boolean
     */
    public function equals($id): bool{
        if ($id instanceof NamespaceId) {
            return $this->id->equals($id->id);
        }
        return false;
    }
}