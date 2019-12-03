<?php

namespace Morebec\ValueObjects\Person;

use Morebec\ValueObjects\Communication\EmailAddress as BaseEmailAddress;

@trigger_error(
    sprintf(
        'The "%s" class is deprecated since version 1.2 use "%s" instead.', 
        EmailAddress::class, 
        BaseEmailAddress::class
    ), 
    E_USER_DEPRECATED
);

/**
 * Represents an Email Address
 * @deprecated since version 1.1.0, use Morebec\ValueObjects\Communication\EmailAddress instead.
 */
final class EmailAddress extends BaseEmailAddress
{
}
