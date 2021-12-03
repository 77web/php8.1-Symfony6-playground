<?php
declare(strict_types=1);

namespace App\Domain\Enum;

enum Interest: string
{
    case PHP = 'php';
    case FRONTEND = 'angular';
    case INFRA = 'aws';
}
