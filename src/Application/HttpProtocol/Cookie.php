<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 19.
 * Time: 12:42
 */

namespace Application\HttpProtocol;

/**
 * Class Cookie
 * @package Application\HttpProtocol
 */
class Cookie implements ICookie
{
    /**
     * @param $key
     * @param string $default
     * @return string
     */
    public function get($key, $default = '')
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
    }

    /**
     * @param $key
     * @param $value
     * @param null $expire
     * @param null $path
     * @param null $domain
     * @param null $secure
     * @param null $httpOnly
     */
    public function set($key, $value, $expire = null, $path = null, $domain = null, $secure = null, $httpOnly = null)
    {
        setcookie($key, $value, $expire, $path, $domain, $secure, $httpOnly);
    }

    /**
     * @param $key
     */
    public function remove($key)
    {
        unset($_COOKIE[$key]);
    }
}
