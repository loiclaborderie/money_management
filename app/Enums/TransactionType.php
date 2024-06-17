<?php

namespace App\Enums;

enum TransactionType: int
{
    case EARN = 1;
    case SPEND = 2;
}
