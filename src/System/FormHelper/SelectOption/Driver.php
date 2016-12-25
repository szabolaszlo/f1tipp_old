<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 21.
 * Time: 13:15
 */

namespace System\FormHelper\SelectOption;

/**
 * Class Driver
 * @package System\FormHelper\SelectOption
 */
class Driver extends ASelectOption
{
    /**
     * @param null $selectedValue
     * @return string
     */
    public function getOptions($selectedValue = null)
    {
        $drivers = $this->entityManager->getRepository('Entity\Driver')->findBy(array(), array('point' => 'DESC'));
        
        return $this->renderer->render(
            'system/form_helper/select_options/driver.tpl',
            array(
                'drivers' => $drivers,
                'selectedValue' => $selectedValue
            )
        );
    }
}
