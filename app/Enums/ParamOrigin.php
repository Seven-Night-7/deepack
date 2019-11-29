<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * 参数来源
 * Class ParamOrigin
 * @package App\Enums
 */
final class ParamOrigin extends Enum
{
    const REQUEST = 1;
    const RESPONSE = 2;
}
