<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OfferStatus extends Enum
{
    const received = 'received';
    const sold = 'sold';
    const cancelled = 'cancelled';
    const in_offer = 'in_offer';
}
