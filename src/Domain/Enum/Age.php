<?php
declare(strict_types=1);

namespace App\Domain\Enum;

enum Age
{
    case TEENAGER;
    case AGE_20_TO_29;
    case AGE_30_TO_39;
    case AGE_40_TO_49;
    case AGE_OVER_50;
}
