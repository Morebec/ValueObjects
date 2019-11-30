<?php

namespace Morebec\ValueObjects\Person;

use Morebec\ValueObjects\BasicEnum;

/**
 * Gender
 */
class Gender extends BasicEnum
{
    const MALE = 'MALE';
    const FEMALE = 'FEMALE';
    const OTHER = 'OTHER';
}
