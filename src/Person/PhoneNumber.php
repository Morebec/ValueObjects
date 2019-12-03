<?php

namespace Morebec\ValueObjects\Person;

use Morebec\ValueObjects\Communication\PhoneNumber as BasePhoneNumber;

@trigger_error(
    sprintf(
        'The "%s" class is deprecated since version 1.2 use "%s" instead.', 
        PhoneNumber::class, 
        BasePhoneNumber::class
    ), 
    E_USER_DEPRECATED
);

/**
 * PhoneNumber
 * @deprecated since version 1.1.0, use Morebec\ValueObjects\Communication\EmailAddress instead.
 */
class PhoneNumber extends BasePhoneNumber
{
}
