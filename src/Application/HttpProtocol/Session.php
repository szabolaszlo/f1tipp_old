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
     * @var array
     */
    protected $session = array();

    /**
     * Session constructor.
     * @param $session
     */
    public function __construct($session)
    {
        $this->session = $session;
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->session[$key] = $value;
    }

    /**
     * @param $key
     * @param string $default
     * @return mixed|string
     */
    public function get($key, $default = '')
    {
        return isset($this->session[$key]) ? $this->session[$key] : $default;
    }
}
