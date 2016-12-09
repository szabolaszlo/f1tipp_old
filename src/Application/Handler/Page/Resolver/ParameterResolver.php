<?php

namespace Application\Handler\Page\Resolver;

/**
 * Class ParameterResolver
 * @package Application\Handler\Page\Resolver
 */
class ParameterResolver implements IResolver
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
        return 'Controller\\Page\\' . ucfirst($this->page);
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action . 'Action';
    }
}
