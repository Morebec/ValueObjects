<?php

namespace Morebec\ValueObjects\File;

use Morebec\ValueObjects\ValueObjectInterface;

/**
 * Directory Value Object
 */
class File implements ValueObjectInterface
{
    /** @var Path */
    private $path;

    public function __construct(Path $path)
    {
        $this->path = $path;
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
     * Indicates if a file exists or not
     * @return [type] [description]
     */
    public function exists(): bool
    {
        return file_exists($this->path);
    }

    /**
     * Returns the real path (full absolute path) of the file.
     * If the file does not exists return the name of the file
     * @return Path
     */
    public function getRealpath(): Path
    {
        if (!$this->exists()) {
            return new Path($this->path);
        }

        return new Path(realpath($this->path));
    }

    /**
     * Returns the file content
     * @return FileContent
     */
    public function getContent(): FileContent
    {
        $content = !$this->exists() ? '' : file_get_contents($this->path);
        return new FileContent($content);
    }

    /**
     * Returns the name of the file without the extension
     * @return string
     */
    public function getFilename(): string
    {
        return pathinfo($this->path, PATHINFO_FILENAME);
    }

    /**
     * Returs the name of the file with the extension
     * @return string
     */
    public function getBasename(): string
    {
        return pathinfo($this->path, PATHINFO_BASENAME);
    }

    /**
     * Returns the path to the directory containing the file
     * if the file does not exists return null
     * @return Path|null
     */
    public function getDirectoryName(): ?Path
    {
        return !$this->exists() ? null : new Path(pathinfo($this->path, PATHINFO_DIRNAME));
    }

    /**
     * Returns a directory instance of the directory containing the file
     * or null if the file does not exist
     * @return Directory|null
     */
    public function getDirectory(): ?Directory
    {
        if (!$this->exists()) {
            return null;
        }
        return new Directory(new Path($this->getDirectoryName()));
    }

    /**
     * Returns the extension of a file or null if the file does not
     * have an extension.
     * @return Extension|null
     */
    public function getExtension(): ?Extension
    {
        $ext = pathinfo($this->path, PATHINFO_EXTENSION);
        return $ext === '' ? null : new Extension($ext);
    }

    /**
     * Returns a string representation of the value object
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getRealpath();
    }


    /**
     * Constructs a File Instance from a path
     * If the file is a directory, and instance of directory
     * will be returned
     * @param  Path   $path path to the file
     * @return File
     */
    public static function fromPath(Path $path): File
    {
        return is_dir($path) ? new Directory($path) : new static($path);
    }

    /**
     * Constructs a File Instance from a path
     * If the file is a directory, and instance of directory
     * will be returned
     * @param  string   $path path to the file
     * @return File
     */
    public static function fromStringPath(string $path): File
    {
        return self::fromPath(new Path($path));
    }
}
