<?php

namespace App\Enums;

enum TicketStatus : string{
    case OPEN = "open";
    case APPROVED = "approved";
    case REJECTED = "rejected";
}