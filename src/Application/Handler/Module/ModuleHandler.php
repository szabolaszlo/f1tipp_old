<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:53
 */

namespace Application\Handler\Module;

use Application\Handler\Handler;
use Application\Handler\Module\Resolver\ModuleParameterResolver;
use Controller\Controller;

/**
 * Class ModuleHandler
 * @package Application\Handler\Module
 */
class ModuleHandler extends Handler
{
    /**
     * @var ModuleParameterResolver
     */
    protected $resolver;
    
    /**
     * @var array
     */
    protected $modules = array();

    /**
     * @var string
     */
    protected $path = '/src/Controller/Module/*';

    /**
     * @var string
     */
    protected $nameSpace = 'Controller\\Module\\';

    /**
     * @return array
     */
    public function getModules()
    {
        $this->resolver->resolve($this->request->getGet('module', ''));

        $moduleDirectories = glob($_SERVER['DOCUMENT_ROOT'] . $this->path, GLOB_ONLYDIR);

        foreach ($moduleDirectories as $moduleDirectory) {
            $moduleClassFile = glob($moduleDirectory . '/*.php');
            $moduleClassFile = substr(strrchr(reset($moduleClassFile), "/"), 1);
            $moduleClassFile = str_replace('.php', '', $moduleClassFile);
            $moduleClassFile = $this->nameSpace . $moduleClassFile . '\\' . $moduleClassFile;

            /** @var Controller $module */
            $module = new $moduleClassFile(
                $this->request,
                $this->session,
                $this->renderer,
                $this->entityManager,
                $this->registry
            );

            if ($this->resolver->getModule() == $module->getId()) {
                $action = $this->resolver->getAction();
            } else {
                $action = 'indexAction';
            }

            $this->modules[$module->getId()] = $module->$action();
        }

        return $this->modules;
    }
}
