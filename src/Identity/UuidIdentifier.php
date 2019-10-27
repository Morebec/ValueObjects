<?php 

namespace Morebec\ValueObjects\Identity;

use Assert\Assertion;
use Morebec\ValueObjects\StringBasedValueObject;

/**
 * UuidIdentifier
 */
class UuidIdentifier extends StringBasedValueObject
{

    function __construct(string $identifier)
    {
        Assertion::uuid($identifier);
        parent::__construct($identifier);        
    }

    /**
     * Generates a new Uuid
     * @return UuidIdentifier
     */
    public static function generate(): UuidIdentifier
    {
        $id = self::generateUuidV4String();
        return new UuidIdentifier($id); 
    }

    /**
     * Generates a valid Uuid v4 string
     * @return string
     */
    private function generateUuidV4String(): string
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}

