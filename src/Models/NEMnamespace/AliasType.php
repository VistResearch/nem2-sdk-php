<?php
/**
 * The alias type. Supported types are:
 * 0: No alias.
 * 1: Mosaic id alias.
 * 2: Address alias.
 *
 * @since 0.10.2
 */
namespace NEM\Models\NEMnamespace;

class AliasType {
    const None = 0;
    const Mosaic = 1;
    const Address = 2;
}