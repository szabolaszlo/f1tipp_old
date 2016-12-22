<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 07.
 * Time: 21:35
 */

namespace Controller\Page\Error;

use Controller\Controller;

/**
 * Class Error
 * @package Controller\Page
 */
class Error extends Controller
{
    /**
     * @return mixed
     */
    public function notFoundAction()
    {
        return $this->render();
    }
}
