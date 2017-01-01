<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 15:55
 */

namespace System\ResultTable;

use Doctrine\ORM\EntityManagerInterface;
use Entity\Event;
use System\Registry\IRegistry;
use System\ResultTable\Type\ITableType;

/**
 * Class ResultTable
 * @package System\ResultTable
 */
class ResultTable
{
    /**
     * @var array
     */
    protected $tableTypes = array();

    /**
     * @var IRegistry
     */
    protected $registry;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * ResultTable constructor.
     * @param IRegistry $registry
     * @param array $tableTypes
     */
    public function __construct(IRegistry $registry, array $tableTypes)
    {
        $this->registry = $registry;
        $this->entityManager = $this->registry->getEntityManager();
        $this->tableTypes = $tableTypes;
    }

    /**
     * @param $type
     * @param Event $event
     * @return string
     */
    public function getTableByType($type, Event $event)
    {
        /** @var ITableType $tableType */
        $tableType = $this->tableTypes[$type];

        return $tableType->getTable($event);
    }

    /**
     * @param $user
     * @param Event $event
     * @return ITableType
     */
    public function getTable($user, Event $event)
    {
        $type = 'only_users';

        $result = $this->entityManager
            ->getRepository('Entity\Result')
            ->findOneBy(array('event' => $event));

        $userBet = $user
            ? $this->entityManager
                ->getRepository('Entity\Bet')
                ->findOneBy(array('user_id' => $user, 'event_id' => $event))
            : false;

        if ($userBet) {
            $type = 'only_bets';
        }

        if ($result) {
            $type = 'full';
        }

        return $this->getTableByType($type, $event);
    }
}
