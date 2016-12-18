<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 18.
 * Time: 23:07
 */
namespace Application\Handler\Module\Resolver;

/**
 * Class ParameterResolver
 * @package Application\Handler\Page\Resolver
 */
class ModuleParameterResolver
{

    /**
     * @var string
     */
    protected $module = '';

    /**
     * @var string
     */
    protected $action = '';

    /**
     * @param $route
     */
    public function resolve($route)
    {
        $route = explode('/', $route);
        if (isset($route[1])) {
            $this->module = $route[0];
            $this->action = $route[1];
        }
    }

    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action . 'Action';
    }
}
