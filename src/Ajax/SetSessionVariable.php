<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 28.
 * Time: 18:06
 */

session_start();

require_once '../../bootstrap.php';

$request = new \Application\HttpProtocol\Request($_POST, $_GET);

$session = new \Application\HttpProtocol\Session();

$session->set(
    $request->getPost('key'),
    $request->getPost('value')
);

