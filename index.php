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

$cookie = new \Application\HttpProtocol\Cookie();

$renderEngine = getTwig();

$registry = new \System\Registry\Registry($request, $session, $entityManager, $cookie, $renderEngine);


$pageResolver = new \Application\Handler\Page\Resolver\PageParameterResolver();
$moduleResolver = new \Application\Handler\Module\Resolver\ModuleParameterResolver();

$pageHandler = new \Application\Handler\Page\PageHandler($registry, $pageResolver);
$moduleHandler = new \Application\Handler\Module\ModuleHandler($registry, $moduleResolver);


$app = new \Application\Application($pageHandler, $moduleHandler, $registry);

$app->dispatch($response);

echo $response->send();
