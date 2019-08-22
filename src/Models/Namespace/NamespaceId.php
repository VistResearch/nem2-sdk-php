<?php

namespace NEM\Models\NEMnamespace;

use NEM\Models\Id;
use NEM\Core\Identifier;
use NEM\Core\Format\Convert as Convert;

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
            $this->fullName = "";
        } else if (is_string($id)) {
            $this->fullName = $id;
            $this->id = new Id(Identifier::generateNamespaceId($id));
        }
    }

    /**
     * Create a NamespaceId object from its encoded hexadecimal notation.
     * @param encoded
     * @returns {NamespaceId}
     */

    public static function createFromEncoded(string $encoded): NamespaceId {
        $uint = array_reverse(Convert::hexToUint8($encoded));
        $hex  = Convert::uint8ToHex($uint);
        $namespace = new NamespaceId(Id::fromHex($hex).toDTO());
        return $namespace;
    }

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

    public function toDTO(){
        return ["id" => $this->id->toDTO(),
                "fullName" => $this->fullName];
    }
}