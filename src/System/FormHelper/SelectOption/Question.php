<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 21.
 * Time: 13:32
 */

namespace System\FormHelper\SelectOption;

/**
 * Class Question
 * @package System\FormHelper\SelectOption
 */
class Question extends ASelectOption
{
    protected $options = array('Igen', 'Nem');
    /**
     * @return string
     */
    public function getOptions()
    {
        return $this->renderer->render(
            'system/form_helper/select_options/question.tpl',
            array(
                'options' => $this->options,
            )
        );
    }
}
