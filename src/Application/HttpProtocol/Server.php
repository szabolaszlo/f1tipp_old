<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 19.
 * Time: 19:56
 */

namespace Application\HttpProtocol;

/**
 * Class Redirect
 * @package Application\HttpProtocol
 */
class Server
{
    /**
     * @var string
     */
    protected $domain;

    /**
     * Server constructor.
     */
    public function __construct()
    {
        $this->domain = 'http://' . $_SERVER['SERVER_NAME'];
    }

    /**
     * @param $path
     */
    public function redirect($path = '')
    {
        $path = $path ? '/?' . $path : '';
        header("Location: " . $this->domain . $path);
        exit;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return mixed
     */
    public function getDocumentRoot()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }
}
