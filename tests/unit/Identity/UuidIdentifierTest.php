<?php 

use Morebec\ValueObjects\Identity\UuidIdentifier;


/**
 * Tests for Uuid  identifier value object class
 */
class UuidIdentifierTest extends \Codeception\Test\Unit
{
    public function testNullUuidIdentifierThrowsException()
    {
        $this->expectException(\TypeError::class);
        $id = new UuidIdentifier(null);
    }

    public function testBlankUuidIdentifierThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $id = new UuidIdentifier('');
    }

    public function testInvalidUuidThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $id = new UuidIdentifier('this is not a valid uuid v4');
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testGenerateUuidReturnsValidIdentifier()
    {
        // If the generated value is invalid, an exception would be thrown
        // and make this test fail. The @doesNotPerformAssertions allows
        // the test to not make assertion, and only check for exceptions
        $id = UuidIdentifier::generate();
        $this->assertNotNull($id);
    }

    public function testEqualityWithPasswordObject()
    {
        $id = new UuidIdentifier(
            '08afa1b1-75b2-48a7-a854-44d37ce5e356'
        );
        $this->assertEquals($id, new UuidIdentifier('08afa1b1-75b2-48a7-a854-44d37ce5e356'));
    }

    public function testEqualityWithString()
    {
        $id = new UuidIdentifier(
            '08afa1b1-75b2-48a7-a854-44d37ce5e356'
        );
        $this->assertEquals('08afa1b1-75b2-48a7-a854-44d37ce5e356', $id);
    }
}