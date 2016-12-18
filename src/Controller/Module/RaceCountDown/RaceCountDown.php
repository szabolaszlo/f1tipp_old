<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:40
 */

namespace Controller\Module\RaceCountDown;

use Controller\Controller;
use System\CountDown\CountDown;
use System\EventManager\EventManager;

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
        /** @var EventManager $eventManager */
        $eventManager = $this->registry->getEventManager();

        $race = $eventManager->getNextRace();

        $countDown = new CountDown($this->getId(), $race->getDateTime(), $this->renderer);

        return $this->renderer->render(
            'controller/module/race_count_down/race_count_down.tpl',
            array(
                'id' => $this->getId(),
                'name' => $race->getName(),
                'date' => $race->getDateTime()->format('Y-m-d H:i'),
                'countDown' => $countDown->render()
            )
        );
    }
}
