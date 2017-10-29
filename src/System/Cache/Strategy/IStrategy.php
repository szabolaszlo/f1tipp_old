<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 21:24
 */

namespace System\Cache\Strategy;

/**
 * Class File
 * @package System\Cache\Strategy
 */
interface IStrategy
{
    /**
     * @param $id
     * @return bool|string
     */
    public function getCache($id);

    /**
     * @param $id
     * @param $content
     */
    public function setCache($id, $content);

    /**
     * @param $id
     */
    public function removeCache($id);
}
