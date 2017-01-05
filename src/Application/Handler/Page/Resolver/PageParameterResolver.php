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
    protected $pageType = '';

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

        if (count($route) == 2) {
            $this->page = $this->pageType = $route[0];
            $this->action = $route[1];
        }

        if (count($route) == 3) {
            $this->pageType = $route[0];
            $this->page = $route[1];
            $this->action = $route[2];
        }
    }


    /**
     * @return string
     */
    public function getPage()
    {
        return 'Controller\\Page\\' . $this->formatName($this->pageType) . '\\' . $this->formatName($this->page);
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

    /**
     * @param $string
     * @return mixed|string
     */
    public function formatName($string)
    {
        $string = str_replace("_", " ", $string);
        $string = ucwords($string);
        $string = str_replace(" ", "", $string);

        return $string;
    }
}
