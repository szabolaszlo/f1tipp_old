<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 15:55
 */

namespace System\ResultTable;

use System\ResultTable\Type\ITableType;

/**
 * Class ResultTable
 * @package System\ResultTable
 */
class ResultTable
{
    protected $tableTypes = array();

    /**
     * ResultTable constructor.
     * @param array $tableTypes
     */
    public function __construct(array $tableTypes)
    {
        $this->tableTypes = $tableTypes;
    }

    /**
     * @param $type
     * @return ITableType
     */
    public function getTableByType($type)
    {
        /** @var ITableType $tableType */
        $tableType = $this->tableTypes[$type];

        return $tableType;
    }
}
