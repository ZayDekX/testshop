<?php

class Autoloader
{
    private static array |null $Directories = null;

    private static string $RootDir = __DIR__;

    public static function RegisterDirectory(string $relativePath): void
    {
        if (is_null(static::$Directories)) {
            static::$Directories = array();
        }

        $path = static::$RootDir . $relativePath;

        if (array_key_exists($path, static::$Directories)) {
            return;
        }

        $directoryIterator = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);

        static::$Directories[$path] = new RecursiveIteratorIterator($directoryIterator, RecursiveIteratorIterator::LEAVES_ONLY);
    }

    public static function SetRoot(string $root)
    {
        static::$RootDir = $root;

        if (!str_ends_with(static::$RootDir, '/')) {
            static::$RootDir = static::$RootDir . '/';
        }
    }

    public static function RegisterDirectories(string...$paths): void
    {
        foreach ($paths as $path) {
            static::RegisterDirectory($path);
        }
    }

    public static function Load(string $className): void
    {
        $fileName = $className . '.php';

        foreach (static::$Directories as $path => $iterator) {
            foreach ($iterator as $file) {
                if (strtolower($file->getFilename()) === strtolower($fileName) && $file->isReadable()) {
                    include_once $file->getPathName();
                    break;
                }
            }
        }
    }
}

spl_autoload_register('Autoloader::Load');