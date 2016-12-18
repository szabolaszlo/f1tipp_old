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
     * @param $parameterResolver
     * @param IRegistry $registry
     */
    public function dispatch(
        IRequest $request,
        ISession $session,
        Response $response,
        $parameterResolver,
        IRegistry $registry
    ) {
        //page
        $this->pageHandler->setDependency($request, $session, $this->renderer, $this->entityManager, $registry);
        $this->pageHandler->setResolver($parameterResolver);
        $page = $this->pageHandler->getPage();

        //modules
        $this->moduleHandler->setDependency($request, $session, $this->renderer, $this->entityManager, $registry);
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
