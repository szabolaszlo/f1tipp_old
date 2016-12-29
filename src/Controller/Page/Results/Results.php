<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 26.
 * Time: 20:41
 */
namespace Controller\Page\Results;

use Controller\Controller;
use Entity\Result;
use System\Registry\IRegistry;
use System\ResultTable\Type\ITableType;

/**
 * Class Results
 * @package Controller\Page\Results
 */
class Results extends Controller
{
    /**
     * @var ITableType
     */
    protected $fullTable;

    /**
     * Betting constructor.
     * @param IRegistry $registry
     */
    public function __construct(IRegistry $registry)
    {
        parent::__construct($registry);

        $this->fullTable = $this->registry->getResultTable()->getTableByType('full');
    }

    /**
     * @return mixed
     */
    public function indexAction()
    {
        $this->data['tables'] = array();

        $results = $this->entityManger->getRepository('Entity\Result')->findAll();

        /** @var Result $result */
        foreach ($results as $result) {
            $this->data['tables'][] = $this->fullTable->getTable($result->getEvent());
        }

        return $this->render();
    }
}
