<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 19.
 * Time: 22:10
 */

namespace Controller\Page\Calendar;

use Controller\Controller;

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
        return $this->action('Event');
    }

    /**
     * @return string
     */
    public function qualifyAction()
    {
        return $this->action('Qualify');
    }

    /**
     * @return string
     */
    public function raceAction()
    {
        return $this->action('Race');
    }

    /**
     * @param $type
     * @return string
     */
    protected function action($type)
    {
        $events = $this->getEvents($type);

        return $this->render($events, $type);
    }

    /**
     * @param $entity
     * @return array
     */
    protected function getEvents($entity)
    {
        return $this->entityManger
            ->createQuery('SELECT e FROM Entity\\' . $entity . ' e WHERE e.date_time > CURRENT_DATE()')
            ->getResult();
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
