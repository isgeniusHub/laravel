<?php
declare(strict_types=1);

function getFilePath(string $className, string &$path): string
{
    $files = scandir($path);
    $class = explode('\\', $className);
    $class = $class[count($class) - 1];

    foreach ($files as $file) {
        $filepath = $path . DIRECTORY_SEPARATOR . $file;
        if (in_array($file, ['.', '..'])) {
            continue;
        }

        if (is_file($filepath)) {
            if (explode('.', $file)[0] !== $class) {
                continue;
            }

            $path .= DIRECTORY_SEPARATOR . $file;
            break;
        }

        if (is_dir($filepath)) {
            $newPath = $path . DIRECTORY_SEPARATOR . $file;
            $newPath = getFilePath($className, $newPath);
            if (is_file($newPath)) {
                $path = $newPath;
                break;
            }
        }
    }
    return $path;
}

function classLoader(string $className): void
{
    $filepath = __DIR__;
    $file = getFilePath($className, $filepath);

    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('classLoader');