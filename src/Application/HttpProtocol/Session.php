<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:12
 */

namespace Application\HttpProtocol;

/**
 * Class Session
 * @package Application\HttpProtocol
 */
class Session implements ISession
{
    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $_SESSION[$_SERVER['SERVER_NAME'] . $key] = $value;
    }

    /**
     * @param $key
     * @param string $default
     * @return mixed|string
     */
    public function get($key, $default = '')
    {
        return isset($_SESSION[$_SERVER['SERVER_NAME'] . $key])
            ? $_SESSION[$_SERVER['SERVER_NAME'] . $key]
            : $default;
    }

    /**
     * @param $key
     */
    public function remove($key)
    {
        unset($_SESSION[$_SERVER['SERVER_NAME'] . $key]);
    }
}
