<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 17.
 * Time: 19:37
 */

namespace System\Registry;

/**
 * Interface IRegistry
 * @package System\Registry
 */
interface IRegistry
{
    public function getCookie();

    public function getUserAuth();

    public function getServer();
}
