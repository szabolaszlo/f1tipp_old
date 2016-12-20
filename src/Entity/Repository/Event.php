<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 20.
 * Time: 18:15
 */
namespace Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class Qualify
 * @package Entity\Repository
 */
class Event extends EntityRepository
{
    /**
     * @return array|mixed
     */
    public function getNextEvent()
    {
        $resultCache = $this->_em->getConfiguration()->getResultCacheImpl();
        $cacheKey = $this->_entityName . 'NextEvent';

        if ($resultCache->contains($cacheKey)) {
            return $resultCache->fetch($cacheKey);
        }

        $date = new \DateTime();
        $date->sub(new \DateInterval('P2D'));

        $nextEvent = $this->createQueryBuilder('q')
            ->where('q.date_time > :time')
            ->setMaxResults(1)
            ->setParameter('time', $date)
            ->getQuery()
            ->getResult();

        if (empty($nextEvent)) {
            $nextEvent = array(parent::findBy(array(), array('eventOrder' => 'DESC'), 1));
        }

        $nextEvent = reset($nextEvent);

        $resultCache->save($cacheKey, $nextEvent, strtotime('+2 days', $nextEvent->getDateTime()->getTimeStamp()));

        return $nextEvent;
    }
}
