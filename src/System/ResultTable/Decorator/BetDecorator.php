<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 26.
 * Time: 22:43
 */

namespace System\ResultTable\Decorator;

use Entity\Bet;
use Entity\BetAttribute;
use System\Registry\IRegistry;
use System\Rule\Attribute\Attribute;
use System\Rule\RuleType\IRuleType;

/**
 * Class BetDecorator
 * @package System\ResultTable\Decorator
 */
class BetDecorator implements IDecorator
{
    const HIGH_CLASS = 'bg-danger';
    
    const LOW_CLASS = 'bg-success';
    
    /**
     * @var IRegistry
     */
    protected $registry;

    /**
     * @var IRuleType
     */
    protected $rule;

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
     */
    public function decorate(Bet $bet)
    {
        /** @var IRuleType $rule */
        $this->rule = $this->registry->getRule()->getRuleType($bet->getEvent()->getType());

        /** @var BetAttribute $betAttribute */
        foreach ($bet->getAttributes() as $betAttribute) {
            $ruleAttribute = $this->rule->getAttributeById($betAttribute->getKey());

            $this->decorateHighPoint($betAttribute, $ruleAttribute);
            $this->decorateLowPoint($betAttribute, $ruleAttribute);
        }
    }

    /**
     * @param BetAttribute $betAttribute
     * @param Attribute $ruleAttribute
     */
    protected function decorateHighPoint(BetAttribute $betAttribute, Attribute $ruleAttribute)
    {
        if ($betAttribute->getPoint() == $ruleAttribute->getHighPoint()) {
            $betAttribute->setClass(self::HIGH_CLASS);
        }
    }

    /**
     * @param BetAttribute $betAttribute
     * @param Attribute $ruleAttribute
     */
    protected function decorateLowPoint(BetAttribute $betAttribute, Attribute $ruleAttribute)
    {
        if ($betAttribute->getPoint() == $ruleAttribute->getLowPoint() && $betAttribute->getPoint() != 0) {
            $betAttribute->setClass(self::LOW_CLASS);
        }
    }
}
