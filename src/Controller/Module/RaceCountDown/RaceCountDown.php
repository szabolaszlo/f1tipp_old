<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:40
 */

namespace Controller\Module\RaceCountDown;

use Controller\Controller;

/**
 * Class RaceCountDown
 * @package Controller\Module
 */
class RaceCountDown extends Controller
{
    /**
     * @return mixed
     */
    public function indexAction()
    {
        $data = "Visszaszámlámo";
        return $this->renderer->render('controller/module/race_count_down/race_count_down.tpl', array('data' => $data));
    }
}
