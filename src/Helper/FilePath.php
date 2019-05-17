<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-17
 * Time: 上午11:50
 */

namespace PhpDemo\Helper;


class FilePath
{
    /**
     * First, you must define the document hierarchy that reaches the project root
     * @var string
     */
    private static $relative = '/../../';

    public static function getDoc($filePath = '')
    {
        $filePath = self::legitimize($filePath);
        $docPath = self::getRoot('doc');

        $path = implode(DIRECTORY_SEPARATOR, [
            $docPath,
            $filePath
        ]);

        return $path;
    }

    public static function legitimize($filePath)
    {
        $path = str_replace('/', DIRECTORY_SEPARATOR, $filePath);
        return $path;
    }

    public static function getRoot($filePath = '')
    {
        $filePath = self::legitimize($filePath);
        $relative = self::legitimize(self::$relative);
        $rootPath = realpath(__DIR__ . $relative);

        $path = implode(DIRECTORY_SEPARATOR, [
            $rootPath,
            $filePath
        ]);

        return $path;
    }
}