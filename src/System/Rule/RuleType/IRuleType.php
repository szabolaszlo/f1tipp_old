<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 20.
 * Time: 22:44
 */
namespace System\Rule\RuleType;

use System\Rule\Attribute\Attribute;

/**
 * Class Qualify
 * @package System\Rule
 */
interface IRuleType
{
    /**
     * @param $attributeId
     * @return Attribute
     */
    public function getAttributeById($attributeId);

    /**
     * @return array
     */
    public function getAllAttribute();
}
