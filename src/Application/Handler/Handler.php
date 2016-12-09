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
     * @param IRequest $request
     * @param ISession $session
     * @param \Twig_Environment $renderer
     * @param $entityManager
     */
    public function setDependency(IRequest $request, ISession $session, \Twig_Environment $renderer, $entityManager)
    {
        $this->request = $request;
        $this->session = $session;
        $this->renderer = $renderer;
        $this->entityManager = $entityManager;
    }
}
