<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 30.
 * Time: 10:08
 */

namespace System\Calculator\RecordCollector;

use Entity\Bet;
use Entity\Result;
use System\Calculator\RecordCollector\Record\Record;

/**
 * Class RecordCollector
 * @package System\Calculator\RecordCollector
 */
class RecordCollector
{
    /**
     * @var array
     */
    protected $records = array();

    /**
     * @param Bet $bet
     * @param Result $result
     */
    public function addRecord(Bet $bet, Result $result)
    {
        $type = $result->getEvent()->getType();
        $userName = $bet->getUser()->getName();
        $point = $bet->getPoint();

        if (!isset($this->records[$type]) || empty($this->records[$type])) {
            $this->records[$type][] = new Record($userName, $point);
            return;
        }

        /** @var Record $record */
        foreach ($this->records[$type] as $key => $record) {
            if ($record->getPoint() < $point) {
                $record->setPoint($point);
                $record->setUserName($userName);
                $this->records[$type] = array($record);
                continue;
            }
            if ($record->getPoint() == $point && $userName != $record->getUserName()) {
                $new = new Record($userName, $point);
                $this->records[$type][] = $new;
                continue;
            }
            if ($record->getPoint() == $point && $userName == $record->getUserName()) {
                $record->addTimes();
                $this->records[$type][$key] = $record;
                continue;
            }
        }
    }

    /**
     * @param $type
     * @return array|mixed
     */
    public function getRecordsByType($type)
    {
        return isset($this->records[$type]) ? $this->records[$type] : array();
    }
}
