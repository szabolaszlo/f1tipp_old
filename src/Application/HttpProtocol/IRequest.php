<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:05
 */

namespace Application\HttpProtocol;

/**
 * Interface IRequest
 * @package Application\HttpProtocol
 */
interface IRequest
{
    /**
     * @param $key
     * @param string $default
     * @return mixed|string
     */
    public function getPost($key, $default = '');

    /**
     * @param $key
     * @param string $default
     * @return mixed|string
     */
    public function getGet($key, $default = '');

    /**
     * @return bool
     */
    public function isPost();
}
