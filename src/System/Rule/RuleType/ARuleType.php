<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 20.
 * Time: 22:41
 */

namespace System\Rule\RuleType;

use System\Rule\Attribute\Attribute;
use System\Rule\Attribute\AttributeFactory;

/**
 * Class ARule
 * @package System\Rule
 */
abstract class ARuleType implements IRuleType
{
    /**
     * @var array(id, type, highPoint, lowPoint)
     */
    protected $betAbleAttributes = array();

    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * @var AttributeFactory
     */
    protected $attributeFactory;

    /**
     * ARule constructor.
     */
    public function __construct()
    {
        $this->attributeFactory = new AttributeFactory();

        $this->attributes = $this->attributeFactory->createAttributes($this->betAbleAttributes);
    }

    /**
     * @param $attributeId
     * @return Attribute
     */
    public function getAttributeById($attributeId)
    {
        /** @var Attribute $attribute */
        $attribute = $this->attributes[$attributeId];
        return $attribute;
    }

    /**
     * @return array
     */
    public function getAllAttribute()
    {
        return $this->attributes;
    }
}
