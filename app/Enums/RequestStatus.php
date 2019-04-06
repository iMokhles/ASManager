<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RequestStatus extends Enum
{
    const received = 'received';
    const in_services = 'in_services';
    const failed_contact_customer_needed = 'failed_contact_customer_needed';
    const failed_manger_approve_needed = 'failed_manger_approve_needed';
    const finished = 'ready';
    const delivered = 'delivered';
}
