<?php

namespace Application\Handler\Page\Resolver;

/**
 * Class ParameterResolver
 * @package Application\Handler\Page\Resolver
 */
class PageParameterResolver
{
    /**
     * @var string
     */
    protected $page = 'error';

    /**
     * @var string
     */
    protected $action = 'notfound';

    /**
     * @var string
     */
    protected $defaultPageClass = 'Controller\\Page\\Error\Error';

    /**
     * @var string
     */
    protected $defaultAction = 'notfoundAction';

    /**
     * @param $route
     */
    public function resolve($route)
    {
        $route = explode('/', $route);
        if (isset($route[1])) {
            $this->page = $route[0];
            $this->action = $route[1];
        }
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return 'Controller\\Page\\' . ucfirst($this->page) . '\\' . ucfirst($this->page) ;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action . 'Action';
    }

    /**
     * @return string
     */
    public function getDefaultPageClass()
    {
        return $this->defaultPageClass;
    }

    /**
     * @return string
     */
    public function getDefaultAction()
    {
        return $this->defaultAction;
    }
}
