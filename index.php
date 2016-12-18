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

$session = new \Application\HttpProtocol\Session($_SESSION);

$pageHandler = new \Application\Handler\Page\PageHandler();
$moduleHandler = new \Application\Handler\Module\ModuleHandler();

$resolver = new \Application\Handler\Page\Resolver\ParameterResolver();

$renderEngine = getTwig();

$registry = new \System\Registry\Registry($request, $session, $entityManager);

$app = new \Application\Application($pageHandler, $moduleHandler, $renderEngine, $entityManager);

$app->dispatch($request, $session, $response, $resolver, $registry);

echo $response->send();
