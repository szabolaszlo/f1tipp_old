<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 03. 28.
 * Time: 20:28
 */

namespace Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Entity\Result as ResultEnt;

/**
 * Class Result
 * @package Entity\Repository
 */
class Result extends EntityRepository
{
    /**
     * @param string $type
     * @return array
     */
    public function findByType($type = '')
    {
        $results = parent::findAll();

        /**
         * @var  integer $key
         * @var  ResultEnt $result
         */
        foreach ($results as $key => $result) {
            $event = $result->getEvent();
            if ($event->getType() !== $type) {
                unset($results[$key]);
            }
        }

        return $results;
    }
}
