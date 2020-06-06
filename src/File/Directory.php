<?php

namespace Morebec\ValueObjects\File;

use Exception;
use Generator;

/**
 * Directory Value Object
 */
class Directory extends File
{
    /**
     * Returns the files contained in the directory
     * @return Generator
     * @throws InvalidFilePathException
     * @throws FileSystemScanFailedException
     */
    public function getFiles(): Generator
    {
        $path = $this->getRealpath();
        /** @var array $systemFiles */
        $systemFiles = \scandir($path);
        if (!$systemFiles) {
            throw new FileSystemScanFailedException("Failed to scan directory: '$path'");
        }
        
        // remove '.' and '..'
        $systemFiles = \array_diff($systemFiles, ['.', '..']);

        foreach ($systemFiles as $file) {
            yield self::fromStringPath($path . '/' . $file);
        }
    }

    /**
     * Returns the number of files in the direcotry
     * @return int
     * @throws FileSystemScanFailedException
     * @throws InvalidFilePathException
     */
    public function getNbFiles(): int
    {
        $c = 0;
        foreach ($this->getFiles() as $f) {
            $c++;
        }

        return $c;
    }
}
