<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 20.
 * Time: 23:07
 */

namespace System\Rule;

use System\Rule\RuleType\IRuleType;

/**
 * Class Rule
 * @package System\Rule
 */
class Rule
{
    protected $ruleTypes = array();

    /**
     * Rule constructor.
     * @param array $ruleTypes
     */
    public function __construct(array $ruleTypes)
    {
        $this->ruleTypes = $ruleTypes;
    }

    /**
     * @param $ruleType
     * @return IRuleType
     */
    public function getRuleType($ruleType)
    {
        /** @var IRuleType $rule */
        $rule = $this->ruleTypes[$ruleType];
        
        return $rule;
    }
}
