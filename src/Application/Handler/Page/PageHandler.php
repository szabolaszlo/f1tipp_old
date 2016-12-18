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
        $this->resolver->resolve($this->request->getGet('route', 'error/notfound'));

        $pageClassName = $this->resolver->getPage();
        /** @var Controller $page */
        $page = new $pageClassName(
            $this->request,
            $this->session,
            $this->renderer,
            $this->entityManager,
            $this->registry
        );

        $action = $this->resolver->getAction();

        return $page->$action();
    }
}
