<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 19.
 * Time: 22:10
 */

namespace Controller\Page\Calendar;

use Controller\Controller;
use Entity\Repository\Event;

/**
 * Class Calendar
 * @package Controller\Page\Calendar
 */
class Calendar extends Controller
{
    /**
     * @return mixed
     */
    public function indexAction()
    {
        /** @var Event $repository */
        $repository = $this->entityManger->getRepository('Entity\Event');

        $remainEvents = $repository->getRemainEvents();

        return $this->render($remainEvents, 'Event');
    }

    /**
     * @return string
     */
    public function qualifyAction()
    {
        /** @var Event $repository */
        $repository = $this->entityManger->getRepository('Entity\Qualify');

        $remainEvents = $repository->getRemainEvents();

        return $this->render($remainEvents, 'Qualify');
    }

    /**
     * @return string
     */
    public function raceAction()
    {
        /** @var Event $repository */
        $repository = $this->entityManger->getRepository('Entity\Race');

        $remainEvents = $repository->getRemainEvents();

        return $this->render($remainEvents, 'Race');
    }

    /**
     * @param $events
     * @param $type
     * @return string
     */
    protected function render($events, $type)
    {
        return $this->renderer->render(
            'controller/page/calendar/calendar.tpl',
            array(
                'events' => $events,
                'type' => $type
            )
        );
    }
}
