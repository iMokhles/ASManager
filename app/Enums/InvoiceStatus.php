<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class InvoiceStatus extends Enum
{
    const paid = 'paid';
    const unpaid = 'unpaid';
    const sold = 'sold';
    const in_offer = 'in_offer';
}
