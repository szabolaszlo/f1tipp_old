<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 16:00
 */

namespace System\ResultTable\Decorator;

use Entity\Bet;

/**
 * Interface IDecorator
 * @package System\ResultTable\Decorator
 */
interface IDecorator
{
    /**
     * @param Bet $bet
     */
    public function decorate(Bet $bet);
}
