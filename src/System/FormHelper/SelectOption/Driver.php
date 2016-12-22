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
class Driver extends ASelectOption implements ISelectOption
{
    /**
     * @return string
     */
    public function getOptions()
    {
        $drivers = $this->entityManager->getRepository('Entity\Driver')->findBy(array(), array('point' => 'DESC'));
        
        return $this->renderer->render(
            'system/form_helper/select_options/driver.tpl',
            array(
                'drivers' => $drivers,
            )
        );
    }
}
