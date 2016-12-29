<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 21:14
 */

namespace System\Cache\Strategy;

/**
 * Class File
 * @package System\Cache\Strategy
 */
class File implements IStrategy
{
    protected $cacheDir;

    /**
     * File constructor.
     */
    public function __construct()
    {
        $this->cacheDir = $_SERVER['DOCUMENT_ROOT'] . '/cache/app';

        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir);
        }
    }

    /**
     * @param $id
     * @return bool|string
     */
    public function getCache($id)
    {
        $file = $this->cacheDir . '/' . $id;
        if (is_file($file)) {
            return file_get_contents($file);
        }

        return false;
    }

    /**
     * @param $id
     * @param $content
     */
    public function setCache($id, $content)
    {
        $file = $this->cacheDir . '/' . $id;
        file_put_contents($file, $content);
    }
}
