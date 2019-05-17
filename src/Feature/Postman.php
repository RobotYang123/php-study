<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-17
 * Time: 上午11:13
 */

namespace PhpDemo\Feature;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class Postman
{
    /**
     * @param $basePath
     * @param $filePath
     * @return bool
     * @throws \League\Flysystem\FileNotFoundException
     */
    public static function cleanLocalData($basePath, $filePath)
    {
        $adapter = new Local($basePath);
        $filesystem = new Filesystem($adapter);
        $jsonStr = $filesystem->read($filePath);

        $data = json_decode($jsonStr, true);
        $envs = $data['environments'];
        $envsNew = array_combine(array_column($envs, 'name'), $envs);
        $data['environments'] = array_values($envsNew);
        $jsonStrNew = json_encode($data);

        $response = $filesystem->update($filePath, $jsonStrNew);

        return $response;
    }
}