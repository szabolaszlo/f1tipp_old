<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:53
 */

namespace Application\Handler;

use System\Registry\IRegistry;

/**
 * Class Handler
 * @package Application\Handler
 */
abstract class Handler
{
    /**
     * @var IRegistry
     */
    protected $registry;

    protected $resolver;

    /**
     * Handler constructor.
     * @param IRegistry $registry
     * @param $resolver
     */
    public function __construct(IRegistry $registry, $resolver)
    {
        $this->registry = $registry;
        $this->resolver = $resolver;
    }
}
