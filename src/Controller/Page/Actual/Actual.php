<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 30.
 * Time: 23:30
 */

namespace Controller\Page\Actual;

use Controller\Controller;
use Entity\Event;
use Entity\Result;

/**
 * Class Actual
 * @package Controller\Page\Actual
 */
class Actual extends Controller
{
    /**
     * @return mixed
     */
    public function indexAction()
    {
        $this->data['domain'] = $this->registry->getServer()->getDomain();

        $events = array(
            $this->entityManager->getRepository('Entity\Qualify')->getNextEvent(),
            $this->entityManager->getRepository('Entity\Race')->getNextEvent()
        );

        $user = $this->registry->getUserAuth()->getLoggedUser();

        $this->data['tables'] = array();

        $now = new \DateTime();

        /** @var Event $event */
        foreach ($events as $event) {
            $id = abs($now->getTimestamp() - $event->getDateTime()->getTimeStamp());

            $this->data['tables'][$id] = $this->registry->getResultTable()->getTable($user, $event);
        }

        ksort($this->data['tables']);

        return $this->render();
    }
}
