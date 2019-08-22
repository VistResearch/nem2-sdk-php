<?php

namespace NEM\Models\Mosiac;

class MosaicRestrictionType {
    /**
     * uninitialized value indicating no restriction
     */
    const NONE = 0;

    /**
     * allow if equal
     */
    const EQ = 1;

    /**
     * allow if not equal
     */
    const NE = 2;

    /**
     * allow if less than
     */
    const LT = 3;

    /**
     * allow if less than or equal
     */
    const LE = 4;

    /**
     * allow if greater than
     */
    const GT = 5;

    /**
     * allow if greater than or equal
     */
    const GE = 6;
}