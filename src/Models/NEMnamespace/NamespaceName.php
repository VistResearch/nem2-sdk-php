<?php

namespace NEM\Models\NEMnamespace;

use NEM\Models\NEMnamespace\NamespaceId;

/**
 * The namespace name info structure describes basic information of a namespace and name.
 */


class NamespaceName {

	/**
     * The namespace id.
     */
    public $namespaceId; //NamespaceId,
    /**
     * The namespace name.
     */
    public $name; //string,
    /**
     * The parent id.
     */
    public $parentId; // NamespaceId


    function __construct(NamespaceId $namespaceId, string $name, NamespaceId $parentId = null) {
    	$this->namespaceId = $namespaceId;
    	$this->name = $name;
    	if($parentId != null){
    		$this->parentId = $parentId;
    	}
    }
}