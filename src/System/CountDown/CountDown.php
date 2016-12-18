<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 18.
 * Time: 17:18
 */
namespace System\CountDown;

/**
 * Class CountDown
 * @package System\CountDown
 */
class CountDown
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var bool|\DateInterval
     */
    protected $remainTime;

    /**
     * @var \Twig_Environment
     */
    protected $renderer;

    /**
     * CountDown constructor.
     * @param $id
     * @param $dateTime
     * @param $renderer
     */
    public function __construct($id, $dateTime, $renderer)
    {
        $this->id = $id;
        $this->renderer = $renderer;

        $now = new \DateTime();
        $this->remainTime = $now->diff($dateTime);
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return $this->renderer->render(
            'system/count_down/count_down.tpl',
            array(
                'id' => $this->id,
                'remainTime' => $this->remainTime
            )
        );
    }
}
