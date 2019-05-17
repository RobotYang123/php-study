<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-17
 * Time: 上午11:40
 */

namespace PhpDemoTests;

use PhpDemo\Feature\Postman;
use PhpDemo\Helper\FilePath;
use PHPUnit\Framework\TestCase;

class FilesystemTest extends TestCase
{
    public function testGetFilePath()
    {
        $data[] = FilePath::getRoot();
        $data[] = FilePath::getRoot('README.md');
        $data[] = FilePath::getRoot('doc/README.md');
        $data[] = FilePath::getDoc('README.md');

        $this->assertTrue(true);
    }

    public function testCleanPostmanLocalData()
    {
        $basePath = FilePath::getDoc('local/postmanData');
        $res = Postman::cleanLocalData($basePath, 'Backup.postman_dump-190517-3-local.json');

        $this->assertTrue(true);
    }
}
