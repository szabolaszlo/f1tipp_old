<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 18.
 * Time: 22:31
 */

namespace Controller\Module\Login;

use Application\HttpProtocol\IServer;
use Controller\Controller;
use Entity\User;
use System\Registry\IRegistry;
use System\UserAuthentication\Authentication;

/**
 * Class Login
 * @package Controller\Module\Login
 */
class Login extends Controller
{
    /**
     * @var Authentication
     */
    protected $authentication;

    /**
     * @var IServer
     */
    protected $server;

    /**
     * Login constructor.
     * @param IRegistry $registry
     */
    public function __construct(IRegistry $registry)
    {
        parent::__construct($registry);

        $this->authentication = $this->registry->getUserAuth();
        $this->server = $this->registry->getServer();
    }

    /**
     * @return mixed
     */
    public function indexAction()
    {
        /** @var User $loggedUser */
        $loggedUser = $this->authentication->getLoggedUser();

        if ($loggedUser) {
            $this->authentication->updateExpire();
            return $this->loggedAction($loggedUser);
        }
        return $this->loginAction();
    }

    /**
     * @return string
     */
    public function loginAction()
    {
        $error = array(
            'error_user' => $this->session->get('error_user'),
            'error_password' => $this->session->get('error_password')
        );

        $userName = $this->session->get('user_name');

        $this->session->remove('error_user');
        $this->session->remove('error_password');
        $this->session->remove('user_name');

        return $this->renderer->render(
            'controller/module/login/login.tpl',
            array(
                'error' => $error,
                'user' => $userName
            )
        );
    }

    /**
     * @param User $loggedUser
     * @return string
     */
    public function loggedAction(User $loggedUser)
    {
        return $this->renderer->render(
            'controller/module/login/logged.tpl',
            array('name' => $loggedUser->getName())
        );
    }

    public function tryLoginAction()
    {
        /** @var User $user */
        $user = $this->entityManger
            ->getRepository('Entity\User')
            ->findOneBy(array('name' => $this->request->getPost('user-name')));

        if (!$user) {
            $this->session->set('error_user', true);
            $this->server->redirect('module=login/login');
        }

        $storedPassword = $user->getPassword();

        if (!password_verify($this->request->getPost('password'), $storedPassword)) {
            $this->session->set('user_name', $user->getName());
            $this->session->set('error_password', true);
            $this->server->redirect('module=login/login');
        }

        $this->authentication->setUserToLogged($user);

        $this->server->redirect();
    }

    public function logoutAction()
    {
        $this->authentication->destroyToken();
        $this->server->redirect();
    }
}
