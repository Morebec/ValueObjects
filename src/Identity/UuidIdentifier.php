<?php 

namespace Morebec\ValueObjects\Identity;

use Assert\Assertion;
use Morebec\ValueObjects\ValueObjectInterface;

/**
 * UuidIdentifier
 */
class UuidIdentifier implements ValueObjectInterface
{
    private $identifier;

    function __construct(string $identifier)
    {
        Assertion::uuid($identifier);
        
        $this->identifier = $identifier;
    }

    public function __toString()
    {
        return $this->identifier;
    }

    /**
     * Indicates if this value object is equal to abother value object
     * @param  ValueObjectInterface $valueObject othervalue object to compare to
     * @return boolean                           true if equal otherwise false
     */
    public function isEqualTo(ValueObjectInterface $valueObject): bool
    {
        return (string)$this === (string)$valueObject;
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

