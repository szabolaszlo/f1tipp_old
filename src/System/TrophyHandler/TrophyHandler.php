<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 03. 28.
 * Time: 20:20
 */

namespace System\TrophyHandler;

use Doctrine\ORM\EntityManagerInterface;
use Entity\Race;
use Entity\Result;
use Entity\Trophy;
use Entity\User;
use System\Calculator\ICalculator;
use System\Registry\IRegistry;

/**
 * Class TrophyHandler
 * @package System\TrophyHandler
 */
class TrophyHandler
{
    const PODIUM_FIRST = 'gold';
    const PODIUM_SECOND = 'silver';
    const PODIUM_THIRD = 'bronze';

    /**
     * @var IRegistry
     */
    protected $registry;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var ICalculator
     */
    protected $calculator;

    /**
     * TrophyHandler constructor.
     * @param IRegistry $registry
     */
    public function __construct(IRegistry $registry)
    {
        $this->registry = $registry;
        $this->entityManager = $this->registry->getEntityManager();
        $this->calculator = $this->registry->getCalculator();
    }

    public function collect()
    {
        $results = $this->entityManager->getRepository('Entity\Result')->findByType('race');

        /** @var Result $result */
        foreach ($results as $result) {
            /** @var Race $race */
            $race = $result->getEvent();

            if ($this->isCollectedRace($race)) {
                continue;
            }

            $this->collectByRace($race);
        }
    }

    /**
     * @param Race $race
     * @return bool
     */
    protected function isCollectedRace(Race $race)
    {
        return (bool)($this->entityManager->getRepository('Entity\Trophy')->findOneBy(array('event' => $race)));
    }

    /**
     * @param Race $race
     */
    protected function collectByRace(Race $race)
    {
        $users = $this->calculator->calculateUserPointsByCompleteWeekend($race);
        $podium = $this->getPodiumUsers($users);
        $this->setTrophiesByPodium($race, $podium);
    }

    /**
     * @param array $users
     * @return array
     */
    protected function getPodiumUsers($users = array())
    {
        $userPoints = array();
        $podium = array(
            self::PODIUM_FIRST => array(),
            self::PODIUM_SECOND => array(),
            self::PODIUM_THIRD => array()
        );

        /** @var User $user */
        foreach ($users as $user) {
            $userPoints[$user->getId()] = $user->getPoint();
        }

        foreach ($podium as $key => $value) {
            $podium[$key] = array_keys($userPoints, max($userPoints));
            foreach ($podium[$key] as $pKey => $userId) {
                $podium[$key][$userId] = $userPoints[$userId];
                unset($userPoints[$userId]);
                unset($podium[$key][$pKey]);
            }
        }

        return $podium;
    }

    /**
     * @param array $podium
     * @param Race $race
     */
    protected function setTrophiesByPodium(Race $race, $podium = array())
    {
        foreach ($podium as $trophyType => $users) {
            foreach ($users as $userId => $userPoint) {
                $this->setTrophy($race, $trophyType, $userId, $userPoint);
            }
        }
        
        $this->entityManager->flush();
    }

    /**
     * @param Race $race
     * @param $trophyType
     * @param $userId
     * @param $userPoint
     */
    protected function setTrophy(Race $race, $trophyType, $userId, $userPoint)
    {
        $user = $this->entityManager->getRepository('Entity\User')->find($userId);

        $trophy = new Trophy();
        $trophy->setEvent($race);
        $trophy->setUser($user);
        $trophy->setPoint($userPoint);
        $trophy->setType($trophyType);

        $this->entityManager->persist($trophy);
    }
}
