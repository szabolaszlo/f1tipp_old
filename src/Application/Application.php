<?php

namespace Application;

use Application\Handler\Module\ModuleHandler;
use Application\Handler\Page\PageHandler;
use Application\HttpProtocol\IRequest;
use Application\HttpProtocol\ISession;
use Application\HttpProtocol\Response;
use Doctrine\ORM\EntityManagerInterface;
use System\Registry\IRegistry;

/**
 * Class Application
 * @package Application
 */
class Application
{
    /**
     * @var \Twig_Environment
     */
    protected $renderer;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var ModuleHandler
     */
    protected $moduleHandler;

    /**
     * @var PageHandler
     */
    protected $pageHandler;

    /**
     * @var string
     */
    protected $domain;

    /**
     * Application constructor.
     * @param PageHandler $pageHandler
     * @param ModuleHandler $moduleHandler
     * @param $renderer
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        PageHandler $pageHandler,
        ModuleHandler $moduleHandler,
        $renderer,
        EntityManagerInterface $entityManager
    ) {
        $this->pageHandler = $pageHandler;
        $this->moduleHandler = $moduleHandler;
        $this->renderer = $renderer;
        $this->entityManager = $entityManager;
        $this->domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
    }

    /**
     * @param IRequest $request
     * @param ISession $session
     * @param Response $response
     * @param IRegistry $registry
     * @param $pageParameterResolver
     * @param $moduleParameterResolver
     */
    public function dispatch(
        IRequest $request,
        ISession $session,
        Response $response,
        IRegistry $registry,
        $pageParameterResolver,
        $moduleParameterResolver
    ) {
        //page
        $this->pageHandler->setDependency(
            $request,
            $session,
            $this->renderer,
            $this->entityManager,
            $registry,
            $pageParameterResolver
        );
        $page = $this->pageHandler->getPage();

        //modules
        $this->moduleHandler->setDependency(
            $request,
            $session,
            $this->renderer,
            $this->entityManager,
            $registry,
            $moduleParameterResolver
        );
        $modules = $this->moduleHandler->getModules();

        //response
        $response->setContent(
            $this->renderer->render(
                'index.tpl',
                array(
                    'domain' => $this->domain,
                    'page' => $page,
                    'modules' => $modules
                )
            )
        );
    }
}
