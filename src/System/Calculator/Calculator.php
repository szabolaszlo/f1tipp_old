<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 27.
 * Time: 13:51
 */

namespace System\Calculator;

use Entity\Bet;
use Entity\BetAttribute;
use Entity\Result;
use System\Registry\IRegistry;
use System\Rule\Attribute\Attribute;
use System\Rule\RuleType\IRuleType;

/**
 * Class Calculator
 * @package System\Calculator
 */
class Calculator implements ICalculator
{
    /**
     * @var IRegistry
     */
    protected $registry;

    /**
     * @var IRuleType
     */
    protected $rule;

    /**
     * @var int
     */
    protected $betFullPoints = 0;

    /**
     * Calculator constructor.
     * @param IRegistry $registry
     */
    public function __construct(IRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param Bet $bet
     * @param Result $result
     */
    public function calculateBetPoints(Bet $bet, Result $result)
    {
        $this->betFullPoints = 0;

        /** @var IRuleType $rule */
        $this->rule = $this->registry->getRule()->getRuleType($result->getEvent()->getType());

        /** @var BetAttribute $betAttribute */
        foreach ($bet->getAttributes() as $betAttribute) {
            $ruleAttribute = $this->rule->getAttributeById($betAttribute->getKey());

            $this->calculateHighPoint($betAttribute, $result, $ruleAttribute);
            $this->calculateLowPoint($betAttribute, $result, $ruleAttribute);
        }

        $bet->setPoint($this->betFullPoints);
    }

    /**
     * @param BetAttribute $betAttribute
     * @param Result $result
     * @param Attribute $ruleAttribute
     */
    protected function calculateHighPoint(BetAttribute $betAttribute, Result $result, Attribute $ruleAttribute)
    {
        if ($betAttribute->getValue() == $result->getAttributeValueByKey($betAttribute->getKey())) {
            $betAttribute->setPoint($ruleAttribute->getHighPoint());
            $this->betFullPoints += $ruleAttribute->getHighPoint();
        }
    }

    /**
     * @param BetAttribute $betAttribute
     * @param Result $result
     * @param Attribute $ruleAttribute
     */
    protected function calculateLowPoint(BetAttribute $betAttribute, Result $result, Attribute $ruleAttribute)
    {
        if ($ruleAttribute->getLowPoint()
            && !$betAttribute->getPoint()
            && $result->existAttributeByValue($betAttribute->getValue())
        ) {
            $betAttribute->setPoint($ruleAttribute->getLowPoint());
            $this->betFullPoints += $ruleAttribute->getLowPoint();
        }
    }
}
