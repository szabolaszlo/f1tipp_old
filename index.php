<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 03.
 * Time: 22:39
 */

session_start();

require_once 'bootstrap.php';

$entityManager = getEntityManager();

$request = new \Application\HttpProtocol\Request($_POST, $_GET);
$response = new \Application\HttpProtocol\Response();

$session = new \Application\HttpProtocol\Session();

$pageHandler = new \Application\Handler\Page\PageHandler();
$moduleHandler = new \Application\Handler\Module\ModuleHandler();

$pageResolver = new \Application\Handler\Page\Resolver\PageParameterResolver();
$moduleResolver = new \Application\Handler\Module\Resolver\ModuleParameterResolver();

$renderEngine = getTwig();

$cookie = new \Application\HttpProtocol\Cookie();

$registry = new \System\Registry\Registry($request, $session, $entityManager, $cookie);

$app = new \Application\Application($pageHandler, $moduleHandler, $renderEngine, $entityManager);

$app->dispatch($request, $session, $response, $registry, $pageResolver, $moduleResolver);

echo $response->send();
