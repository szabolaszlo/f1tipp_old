<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 15:58
 */

namespace System\ResultTable\Type;

use Entity\Event;

/**
 * Interface ITableType
 * @package System\ResultTable\Type
 */
interface ITableType
{
    /**
     * @param Event $event
     * @return string
     */
    public function getTable(Event $event);
}
