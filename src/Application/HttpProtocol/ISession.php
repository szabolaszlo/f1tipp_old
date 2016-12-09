<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:10
 */

namespace Application\HttpProtocol;

/**
 * Interface ISession
 * @package Application\HttpProtocol
 */
interface ISession
{
    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value);

    /**
     * @param $key
     * @param string $default
     * @return mixed|string
     */
    public function get($key, $default = '');
}
