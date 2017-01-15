<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 09.
 * Time: 11:08
 */
namespace Application\Handler\Page;

use Application\Handler\Handler;
use Application\Handler\Page\Resolver\PageParameterResolver;
use Controller\Controller;

/**
 * Class PageHandler
 * @package Application\Handler\Page
 */
class PageHandler extends Handler
{
    /**
     * @var PageParameterResolver
     */
    protected $resolver;

    /**
     * @param array $moduleInPage
     * @param array $modules
     * @return array
     */
    public function getPage($moduleInPage = array(), $modules = array())
    {
        $this->resolver->resolve($this->registry->getRequest()->getQuery('page', 'actual/index'));

        $pageClassName = $this->resolver->getPage();

        if (!class_exists($pageClassName)) {
            $pageClassName = $this->resolver->getDefaultPageClass();
        }

        /** @var Controller $page */
        $page = new $pageClassName($this->registry);

        if (array_key_exists($page->getId(), $moduleInPage)) {
            $pageModules = array();
            foreach ($moduleInPage[$page->getId()] as $moduleId) {
                $pageModules[$moduleId] = isset($modules[$moduleId]) ? $modules[$moduleId] : '';
            }
            $page->setModules($pageModules);
        }
        
        $action = $this->resolver->getAction();

        if (!method_exists($page, $action)) {
            $pageClassName = $this->resolver->getDefaultPageClass();

            /** @var Controller $page */
            $page = new $pageClassName($this->registry);

            $action = $this->resolver->getDefaultAction();
        }

        return array('id' => $page->getId(), 'content' => $page->$action());
    }
}
