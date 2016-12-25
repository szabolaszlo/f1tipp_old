<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 21.
 * Time: 13:40
 */
namespace System\FormHelper\SelectOption;

/**
 * Class Driver
 * @package System\FormHelper\SelectOption
 */
interface ISelectOption
{
    /**
     * @param null $selectedValue
     * @return mixed
     */
    public function getOptions($selectedValue = null);
}
