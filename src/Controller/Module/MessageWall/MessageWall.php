<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 01. 07.
 * Time: 13:09
 */

namespace Controller\Module\MessageWall;

use Controller\Controller;
use Entity\Message;

/**
 * Class MessageWall
 * @package Controller\Module\MessageWall
 */
class MessageWall extends Controller
{
    /**
     * @return mixed
     */
    public function indexAction()
    {
        $this->data['token'] = md5(time());
        $this->session->set('token', $this->data['token']);

        $this->data['messages'] = $this->entityManager
            ->getRepository('Entity\Message')
            ->findBy(array(), array('id' => 'DESC'), 50);

        $this->data['userToken'] = $this->registry->getUserAuth()->getActualToken();

        return $this->render();
    }

    /**
     * @return string
     */
    public function formAction()
    {
        $this->data['token'] = md5(time());
        $this->session->set('token', $this->data['token']);

        $this->data['placeholder'] = $this->session->get('messages_placeholder');
        $this->session->remove('messages_placeholder');

        $this->data['userToken'] = $this->registry->getUserAuth()->getActualToken();

        $this->setTemplate('controller/module/message_wall/form.tpl');

        return $this->render();
    }

    /**
     * @return string
     */
    public function messagesAction()
    {
        $this->data['messages'] = $this->entityManager
            ->getRepository('Entity\Message')
            ->findBy(array(), array('id' => 'DESC'), 50);

        $this->setTemplate('controller/module/message_wall/messages.tpl');

        return $this->render();
    }

    public function saveAction()
    {
        $user = $this->registry->getUserAuth()->getUserByToken($this->request->getPost('user-token'));

        if ($this->request->isPost()
            && $user
            && $this->request->getPost('token', 'notEqual') == $this->session->get('token')
            && $this->request->getPost('message')
        ) {
            $message = new Message();
            $message->setContent($this->request->getPost('message'));
            $message->setUser($user);
            $message->setDateTime(new \DateTime());

            $this->entityManager->persist($message);
            $this->entityManager->flush();
        } else {
            $placeholder = $user
                ? $this->registry->getLanguage()->get($this->id . '_empty_message')
                : $this->registry->getLanguage()->get($this->id . '_not_logged_in');

            $this->session->set('messages_placeholder', $placeholder);
        }

        $this->session->remove('token');
    }
}
