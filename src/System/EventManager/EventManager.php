<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 18.
 * Time: 10:50
 */

namespace System\EventManager;

use Doctrine\ORM\EntityManagerInterface;
use Entity\Qualify;
use Entity\Race;

/**
 * Class EventManager
 * @package System\EventManager
 */
class EventManager
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var Race
     */
    protected $lastRace;

    /**
     * @var Race
     */
    protected $nextRace;

    /**
     * @var Qualify
     */
    protected $lastQualify;

    /**
     * @var Qualify
     */
    protected $nextQualify;

    /**
     * EventManager constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->setEvents();
    }

    protected function setEvents()
    {
        $lastResults = $this->entityManager
            ->getRepository('Entity\Result')
            ->findBy(array(), array('event' => 'desc'), 2);

        /** @var \Entity\Result $lastResult */
        foreach ($lastResults as $lastResult) {
            if ($lastResult->getEvent() instanceof Qualify) {
                $this->lastQualify = $lastResult->getEvent();
            }
            if ($lastResult->getEvent() instanceof Race) {
                $this->lastRace = $lastResult->getEvent();
            }
        }

        $nextQualifyOrderId = $this->lastQualify ? $this->lastQualify->getEventOrder() + 1 : 1;
        $nextRaceOrderId = $this->lastRace ? $this->lastRace->getEventOrder() + 1 : 1;

        $this->nextQualify = $this->entityManager
            ->getRepository('Entity\Qualify')
            ->findOneBy(array('eventOrder' => $nextQualifyOrderId));

        if (!$this->nextQualify) {
            $this->nextQualify = $this->entityManager
                ->getRepository('Entity\Qualify')
                ->findOneBy(array('eventOrder' => $nextQualifyOrderId - 1));
        }

        $this->nextRace = $this->entityManager
            ->getRepository('Entity\Race')
            ->findOneBy(array('eventOrder' => $nextRaceOrderId));

        if (!$this->nextRace) {
            $this->nextRace = $this->entityManager
                ->getRepository('Entity\Race')
                ->findOneBy(array('eventOrder' => $nextRaceOrderId - 1));
        }
    }

    /**
     * @return Race
     */
    public function getLastRace()
    {
        return $this->lastRace;
    }

    /**
     * @return Race
     */
    public function getNextRace()
    {
        return $this->nextRace;
    }

    /**
     * @return Qualify
     */
    public function getLastQualify()
    {
        return $this->lastQualify;
    }

    /**
     * @return Qualify
     */
    public function getNextQualify()
    {
        return $this->nextQualify;
    }
}
