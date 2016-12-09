<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 07.
 * Time: 21:35
 */

namespace Controller\Page;

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
        $data = "Az oldal nem található";
        return $this->renderer->render('controller/page/error.tpl', array('data' => $data));
    }
}
