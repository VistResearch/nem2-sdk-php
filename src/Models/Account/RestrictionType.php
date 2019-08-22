<?php

namespace NEM\Models\Account;

class RestrictionType {
    const AllowAddress = 0x01;
    const AllowMosaic = 0x02;
    const AllowTransaction = 0x04;
    const Sentinel = 0x05;
    const BlockAddress = (0x80 + 0x01);
    const BlockMosaic = (0x80 + 0x02);
    const BlockTransaction = (0x80 + 0x04);
}