<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 19.
 * Time: 20:07
 */

namespace Application\HttpProtocol;

/**
 * Interface IServer
 * @package Application\HttpProtocol
 */
interface IServer
{
    /**
     * @param $path
     * @return mixed
     */
    public function redirect($path = '');
        
    public function getDomain();
}
