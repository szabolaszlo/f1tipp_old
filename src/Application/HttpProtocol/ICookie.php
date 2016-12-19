<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 19.
 * Time: 12:43
 */

namespace Application\HttpProtocol;

/**
 * Interface ICookie
 * @package Application\HttpProtocol
 */
interface ICookie
{
    /**
     * @param $key
     * @param string $default
     * @return string
     */
    public function get($key, $default = '');

    /**
     * @param $key
     * @param $value
     * @param null $expire
     * @param null $path
     * @param null $domain
     * @param null $secure
     * @param null $httpOnly
     */
    public function set($key, $value, $expire = null, $path = null, $domain = null, $secure = null, $httpOnly = null);

    /**
     * @param $key
     */
    public function remove($key);
}
