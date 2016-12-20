<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:40
 */

namespace Controller\Module\RaceCountDown;

use Controller\Controller;
use Entity\Race;
use Entity\Repository\Event;
use System\CountDown\CountDown;

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
        /** @var Event $repository */
        $repository = $this->entityManger->getRepository('Entity\Race');

        /** @var Race $qualify */
        $race = $repository->getNextEvent();

        $countDown = new CountDown($this->getId(), $race->getDateTime(), $this->renderer);

        return $this->renderer->render(
            'controller/module/count_down/count_down.tpl',
            array(
                'id' => $this->getId(),
                'name' => $race->getName(),
                'date' => $race->getDateTime()->format('Y-m-d H:i'),
                'countDown' => $countDown->render()
            )
        );
    }
}
