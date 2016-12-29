<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 15:51
 */

namespace System\Calculator;

use Entity\Bet;
use Entity\Result;

/**
 * Interface ICalculator
 * @package System\Calculator
 */
interface ICalculator
{
    /**
     * @param Bet $bet
     * @param Result $result
     */
    public function calculateBetPoints(Bet $bet, Result $result);
}
