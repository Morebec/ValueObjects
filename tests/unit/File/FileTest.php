<?php

use Morebec\ValueObjects\File\Directory;
use Morebec\ValueObjects\File\File;
use Morebec\ValueObjects\File\Path;

/**
 * FileTest
 */
class FileTest extends Codeception\Test\Unit
{
    public function testFileExists(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertTrue($f->exists());
    }

    public function testFileDoesNotExist(): void
    {
        $f = new File(new Path('does not exist'));
        $this->assertFalse($f->exists());
    }

    public function testGetContent(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertTrue(strpos($f->getContent(), 'FileTest') !== false);
    }

    public function testGetContentOnFileNotExisting(): void
    {
        $f = new File(new Path('does not exist'));
        
        $this->expectException(\Exception::class);
        $f->getContent();
    }

    public function testGetFilename(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertEquals('FileTest', $f->getFilename());
    }

    public function testGetFilenameOnFileNotExisting(): void
    {
        $f = new File(new Path('does not exist'));
        $this->assertEquals('does not exist', $f->getFilename());
    }

    public function testGetBasename(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertEquals('FileTest.php', $f->getBasename());
    }

    public function testGetBasenameOnFileNotExisting(): void
    {
        $f = new File(new Path('does not exist'));
        $this->assertEquals('does not exist', $f->getBasename());

        $f = new File(new Path(''));
        $this->assertEquals(null, $f->getBasename());
    }

    public function testGetDirectoryName(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertEquals(__DIR__, $f->getDirectoryPath());
    }

    public function testGetDirectoryNameOnFileNotExisting(): void
    {
        $f = new File(new Path('does not exist'));
        $this->assertEquals(null, $f->getDirectoryPath());
    }

    public function testGetDirectory(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertEquals(__DIR__, $f->getDirectory());
    }

    public function testGetDirectoryOnFileNotExisting(): void
    {
        $f = new File(new Path('does not exist'));
        $this->assertEquals(null, $f->getDirectory());
    }

    public function testGetExtension(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertEquals('php', $f->getExtension());
    }

    public function testGetExtensionOnFileNotExisting(): void
    {
        $f = new File(new Path('does not exist'));
        $this->assertEquals(null, $f->getExtension());
    }

    public function testGetRealPath(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertEquals(realpath(__FILE__), $f->getRealPath());
    }

    public function testGetRealPathOnFileNotExisting(): void
    {
        $f = new File(new Path('does not exist'));
        $this->assertEquals('does not exist', $f->getRealPath());
    }

    public function testEqualityWithString(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertEquals(realpath(__FILE__), $f);
    }

    public function testInequalityWithString(): void
    {
        $f = new File(new Path('does not exist'));
        $this->assertEquals('does not exist', $f);
    }

    public function testEqualityWithValueObject(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertEquals($f, new File(new Path(__FILE__)));
    }

    public function testInequalityWithValueObject(): void
    {
        $f = new File(new Path(__FILE__));
        $this->assertNotEquals($f, new File(new Path(__DIR__)));
    }

    public function testFromPath(): void
    {
        $f = File::fromPath(new Path(__FILE__));
        $this->assertInstanceOf(File::class, $f);

        $f = File::fromPath(new Path(__DIR__));
        $this->assertInstanceOf(Directory::class, $f);
    }

    public function testFromStringPath(): void
    {
        $f = File::fromStringPath(new Path(__FILE__));
        $this->assertInstanceOf(File::class, $f);

        $f = File::fromStringPath(new Path(__DIR__));
        $this->assertInstanceOf(Directory::class, $f);
    }
}