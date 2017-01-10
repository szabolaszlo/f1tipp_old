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
     * @var string
     */
    protected $moduleType = '';

    /**
     * @param $route
     */
    public function resolve($route)
    {
        $route = explode('/', $route);

        if (count($route) == 2) {
            $this->module = $this->moduleType = $route[0];
            $this->action = $route[1];
        }

        if (count($route) == 3) {
            $this->moduleType = $route[0];
            $this->module = $route[1];
            $this->action = $route[2];
        }
    }
    /**
     * @return string
     */
    public function getModuleClass()
    {
        return 'Controller\\Module\\' . $this->formatName($this->moduleType) . '\\' . $this->formatName($this->module);
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
