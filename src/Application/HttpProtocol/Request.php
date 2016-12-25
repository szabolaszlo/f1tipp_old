<?php

namespace Application\HttpProtocol;

/**
 * Class Request
 * @package Application\HttpProtocol
 */
class Request implements IRequest
{
    /**
     * @var array
     */
    protected $post = array();

    /**
     * @var array
     */
    protected $get = array();

    /**
     * Request constructor.
     * @param array $post
     * @param array $get
     */
    public function __construct(array $post, array $get)
    {
        $this->post = $post;
        $this->get = $get;
    }

    /**
     * @param $key
     * @param string $default
     * @return mixed|string
     */
    public function getPost($key, $default = '')
    {
        return isset($this->post[$key]) ? $this->post[$key] : $default;
    }

    /**
     * @param $key
     * @param string $default
     * @return mixed|string
     */
    public function getGet($key, $default = '')
    {
        return isset($this->get[$key]) ? $this->get[$key] : $default;
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return (bool)(!empty($this->post));
    }
}
