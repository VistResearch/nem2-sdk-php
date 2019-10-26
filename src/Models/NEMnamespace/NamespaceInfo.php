<?php

namespace NEM\Models\NEMnamespace;

use NEM\Models\NEMnamespace\NamespaceId;
use NEM\Models\NEMnamespace\Alias;
use NEM\Models\Account\PublicAccount;
use NEM\Models\UInt64;



/**
 * Object containing information of a namespace.
 */
class NamespaceInfo {
	/**
     * Namespace is active.
     */
	public $active;//: boolean,
    /**
     * The namespace index.
     */
    public $index;//: number,
    /**
     * The meta data id.
     */
    public $metaId;//: string,
    /**
     * The namespace type, namespace and sub namespace.
     */
    private $type;//: number,
    /**
     * The level of namespace.
     */
    public $depth;// number,
    /**
     * The namespace id levels.
     */
    public $levels;// NamespaceId[],
    /**
     * The namespace parent id.
     */
    private $parentId;// NamespaceId,
    /**
     * The owner of the namespace.
     */
    public $owner;// PublicAccount,
    /**
     * The height at which the ownership begins.
     */
    public $startHeight;// UInt64,
    /**
     * The height at which the ownership ends.
     */
    public $endHeight;// UInt64,
    /**
     * The alias linked to a namespace.
     */
    public $alias;// Alias

    function __construct(bool $active, $index, string $metaId, $type, $depth,
                Array $levels, NamespaceId $parentId, PublicAccount $owner,
                UInt64 $startHeight, UInt64 $endHeight, Alias $alias) {
    	$this->active = $active;
    	$this->index = $index;
    	$this->metaId = $metaId;
    	$this->type = $type;
    	$this->depth = $depth;
    	$this->levels = $levels;
    	$this->parentId = $parentId;
    	$this->owner = $owner;
    	$this->startHeight = $startHeight;
    	$this->endHeight = $endHeight;
    	$this->alias = $alias;

    }

    /**
     * Namespace id
     * @returns {Id}
     */
    public function getId(): NamespaceId {
        return $this->levels[sizeof($this->levels) - 1];
    }

    /**
     * Is root namespace
     * @returns {boolean}
     */
    public function isRoot(): bool {
        return $this->type === 0;
    }

    /**
     * Is sub namepsace
     * @returns {boolean}
     */
    public function isSubnamespace(): bool {
        return $this->type === 1;
    }

    /**
     * Has alias
     * @returns {boolean}
     */
    public function hasAlias(): bool {
        return $this->alias->type !== 0;
    }

    /**
     * Get parent id
     * @returns {Id}
     */
    public function parentNamespaceId(): NamespaceId {
        if ($this->isRoot()) {
            throw new Error('Is a Root Namespace');
        }
        return $this->parentId;
    }
}