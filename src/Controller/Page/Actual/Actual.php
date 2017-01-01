<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 30.
 * Time: 23:30
 */

namespace Controller\Page\Actual;

use Controller\Controller;
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

        foreach ($events as $key => $event) {
            /** @var Result $result */
            $result = $this->entityManager
                ->getRepository('Entity\Result')
                ->findOneBy(array('event' => $event));

            $id = $result ? $result->getId() : $key;

            $this->data['tables'][$id] = $this->registry->getResultTable()->getTable($user, $event);
        }

        return $this->render();
    }
}
