<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 01. 07.
 * Time: 13:09
 */

namespace Controller\Module\MessageWall;

use Controller\Controller;

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
        $this->data['messages'] = $this->entityManager
            ->getRepository('Entity\Message')
            ->findBy(array(), array('id'=> 'DESC'), 50);
        
        return $this->render();
    }
}
