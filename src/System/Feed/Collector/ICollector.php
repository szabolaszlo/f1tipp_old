<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.10.27.
 * Time: 23:08
 */

namespace System\Feed\Collector;


/**
 * Class XMLCollector
 * @package System\Feed\Collector
 */
interface ICollector
{
    /**
     * @param $source
     * @return \SimpleXMLElement
     */
    public function getData($source);
}