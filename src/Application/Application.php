<?php

namespace Application;

use Application\Handler\Module\ModuleHandler;
use Application\Handler\Page\PageHandler;
use Application\HttpProtocol\Response;
use System\Registry\IRegistry;

/**
 * Class Application
 * @package Application
 */
class Application
{
    /**
     * @var ModuleHandler
     */
    protected $moduleHandler;

    /**
     * @var PageHandler
     */
    protected $pageHandler;

    /**
     * @var IRegistry
     */
    protected $registry;

    /**
     * @var array
     */
    protected $moduleInPage = array(
        'actual' => array('messageWall', 'news', 'feed', 'topFeed')
    );

    /**
     * Application constructor.
     * @param PageHandler $pageHandler
     * @param ModuleHandler $moduleHandler
     * @param IRegistry $registry
     */
    public function __construct(
        PageHandler $pageHandler,
        ModuleHandler $moduleHandler,
        IRegistry $registry
    ) {
        $this->pageHandler = $pageHandler;
        $this->moduleHandler = $moduleHandler;
        $this->registry = $registry;
    }

    /**
     * @param Response $response
     */
    public function dispatch(Response $response)
    {
        //modules
        $modules = $this->moduleHandler->getModules();

        //page
        $page = $this->pageHandler->getPage($this->moduleInPage, $modules);

        //response
        $response->setContent(
            $this->registry->getRenderer()->render(
                'application/index.tpl',
                array(
                    'domain' => $this->registry->getServer()->getDomain(),
                    'page' => $page,
                    'modules' => $modules,
                    'language' => $this->registry->getLanguage(),
                    'isAdmin' => $this->registry->getUserAuth()->isAdmin()
                )
            )
        );
    }

    /**
     * @param Response $response
     */
    public function dispatchAjax(Response $response)
    {
        $page = '';
        $module = '';

        //module
        if ($this->registry->getRequest()->getQuery('module', false)) {
            $module = $this->moduleHandler->getModule();
        }

        //page
        if ($this->registry->getRequest()->getQuery('page', false)) {
            $page = $this->pageHandler->getPage($this->moduleInPage, array($module));
        }

        //response
        $response->setContent(
            $this->registry->getRenderer()->render(
                'application/ajax.tpl',
                array(
                    'domain' => $this->registry->getServer()->getDomain(),
                    'page' => $page,
                    'module' => $module,
                    'language' => $this->registry->getLanguage(),
                    'isAdmin' => $this->registry->getUserAuth()->isAdmin()
                )
            )
        );
    }
}
