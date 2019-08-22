<?php

namespace NEM\Models\Transaction;

/**
 * Hash type. Supported types are:
 * 0: Op_Sha3_256 (default).
 * 1: Op_Keccak_256 (ETH compatibility).
 * 2: Op_Hash_160 (first with SHA-256 and then with RIPEMD-160 (BTC compatibility))
 * 3: Op_Hash_256: input is hashed twice with SHA-256 (BTC compatibility)
 */

class HashType {
    const Op_Sha3_256 = 0;
    const Op_Keccak_256 = 1;
    const Op_Hash_160 = 2;
    const Op_Hash_256 = 3;
}

function HashTypeLengthValidator(int $hashType, string $input): boolean {
    if (ctype_xdigit($input) && strlen($input) % 2 == 0) {
        switch ($hashType) {
            case HashType::Op_Sha3_256:
            case HashType::Op_Hash_256:
            case HashType::Op_Keccak_256:
                return strlen($input) === 64;
            case HashType::Op_Hash_160:
                return strlen($input) === 40;
            default:
                break;
        }
    }
    return false;
}