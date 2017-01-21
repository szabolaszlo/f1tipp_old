<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 01. 15.
 * Time: 21:43
 */

namespace Controller\Module\TableRefresh;

use Controller\Controller;
use Entity\Event;

/**
 * Class TableRefresh
 * @package Controller\Module\TableRefresh
 */
class TableRefresh extends Controller
{

    public function isNeedRefreshAction()
    {
        $eventId = $this->request->getPost('eventId', 0);

        $postedNumberOfBets = $this->request->getPost('numberOfBets', 0);

        /** @var Event $event */
        $bets = $this->entityManager->getRepository('Entity\Bet')->findBy(array('event_id' => $eventId));

        $result = $this->entityManager->getRepository('Entity\Result')->findBy(array('event' => $eventId))
            ? $this->entityManager->getRepository('Entity\Result')->findBy(array('event' => $eventId))
            : array();

        if ((count($bets) + count($result)) > $postedNumberOfBets) {
            echo true;
        }
    }

    /**
     * @return \System\ResultTable\Type\ITableType
     */
    public function getTableAction()
    {
        /** @var Event $event */
        $event = $this->entityManager->getRepository('Entity\Event')->find($this->request->getPost('eventId'));

        $user = $this->registry->getUserAuth()->getLoggedUser();

        return $this->registry->getResultTable()->getTable($user, $event);
    }
}
