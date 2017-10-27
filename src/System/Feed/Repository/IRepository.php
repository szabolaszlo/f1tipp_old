<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.10.27.
 * Time: 23:38
 */

namespace System\Feed\Repository;

/**
 * Class MotorSportRepository
 * @package System\Feed\Repository
 */
interface IRepository
{
    /**
     * @return array
     */
    public function getItems();
}
