<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * 请求方式
 * Class MethodType
 * @package App\Enums
 */
final class MethodType extends Enum
{
    const GET = 1;
    const POST = 2;
    const PUT = 3;
    const PATCH = 4;
    const DELETE = 5;
}
