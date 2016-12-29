<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:40
 */

namespace Controller\Module\QualifyCountDown;

use Controller\Controller;
use Entity\Qualify;
use Entity\Repository\Event;
use System\CountDown\CountDown;

/**
 * Class RaceCountDown
 * @package Controller\Module
 */
class QualifyCountDown extends Controller
{
    /**
     * @return mixed
     */
    public function indexAction()
    {
        /** @var Event $repository */
        $repository = $this->entityManager->getRepository('Entity\Qualify');

        /** @var Qualify $qualify */
        $qualify = $repository->getNextEvent();

        $countDown = new CountDown($this->getId(), $qualify->getDateTime(), $this->renderer);

        $this->data['id'] = $this->getId();
        $this->data['name'] = $qualify->getName();
        $this->data['date'] = $qualify->getDateTime()->format('Y-m-d H:i');
        $this->data['countDown'] = $countDown->render();
        
        $this->setTemplate('controller/module/count_down/count_down.tpl');
        
        return $this->render();
    }
}
