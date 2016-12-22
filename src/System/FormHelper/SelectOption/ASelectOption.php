<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 21.
 * Time: 13:15
 */

namespace System\FormHelper\SelectOption;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class ASelectOption
 * @package System\FormHelper\SelectOption
 */
abstract class ASelectOption
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var \Twig_Environment
     */
    protected $renderer;

    /**
     * Driver constructor.
     * @param EntityManagerInterface $entityManager
     * @param \Twig_Environment $renderer
     */
    public function __construct(EntityManagerInterface $entityManager, \Twig_Environment $renderer)
    {
        $this->entityManager = $entityManager;
        $this->renderer = $renderer;
    }

    /**
     * @return string
     */
    abstract public function getOptions();
}
