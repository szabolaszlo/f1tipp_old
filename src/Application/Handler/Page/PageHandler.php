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
     * @return mixed
     */
    public function getPage()
    {
        $this->resolver->resolve($this->request->getGet('page', 'error/notfound'));

        $pageClassName = $this->resolver->getPage();

        if (!class_exists($pageClassName)) {
            $pageClassName = $this->resolver->getDefaultPageClass();
        }

        /** @var Controller $page */
        $page = new $pageClassName(
            $this->request,
            $this->session,
            $this->renderer,
            $this->entityManager,
            $this->registry
        );

        $action = $this->resolver->getAction();

        if (!method_exists($page, $action)) {
            $pageClassName = $this->resolver->getDefaultPageClass();

            /** @var Controller $page */
            $page = new $pageClassName(
                $this->request,
                $this->session,
                $this->renderer,
                $this->entityManager,
                $this->registry
            );

            $action = $this->resolver->getDefaultAction();
        }

        return array('id'=> $page->getId(), 'content' => $page->$action());
    }
}
