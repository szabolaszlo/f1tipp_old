<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:53
 */

namespace Application\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Application\HttpProtocol\IRequest;
use Application\HttpProtocol\ISession;
use System\Registry\IRegistry;

/**
 * Class Handler
 * @package Application\Handler
 */
abstract class Handler
{
    /**
     * @var IRequest
     */
    protected $request;

    /**
     * @var ISession
     */
    protected $session;

    /**
     * @var \Twig_Environment
     */
    protected $renderer;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var IRegistry
     */
    protected $registry;
    
    protected $resolver;

    /**
     * @param IRequest $request
     * @param ISession $session
     * @param \Twig_Environment $renderer
     * @param $entityManager
     * @param IRegistry $registry
     * @param $resolver
     */
    public function setDependency(
        IRequest $request,
        ISession $session,
        \Twig_Environment $renderer,
        $entityManager,
        IRegistry $registry,
        $resolver
    ) {
        $this->request = $request;
        $this->session = $session;
        $this->renderer = $renderer;
        $this->entityManager = $entityManager;
        $this->registry = $registry;
        $this->resolver = $resolver;
    }
}
