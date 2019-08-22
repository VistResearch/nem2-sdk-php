<?php 

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount;
use NEM\Models\Transaction\MultisigCosignatoryModificationType;
use NEM\Core\SerializeBase;
use NEM\util\Base32;

class MultisigCosignatoryModification {

    /**
     * Constructor
     * @param type
     * @param cosignatoryPublicAccount
     */

    public $type;
    public $cosignatoryPublicAccount;

    function __construct(
                /**
                 * Multi-signature modification type.
                 * element of MultisigCosignatoryModificationType
                 */
                int $type,
                /**
                 * Cosignatory public account.
                 */
                PublicAccount $cosignatoryPublicAccount) {
        
        $this->type = $type;
        $this->cosignatoryPublicAccount = $cosignatoryPublicAccount;


    }

    /**
     * @internal
     */
    public function toDTO() {
        return ["cosignatoryPublicKey" => $this->cosignatoryPublicAccount->publicKey,
                "type" => $this->type];
    }
}