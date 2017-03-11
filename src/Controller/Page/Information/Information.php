<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 03. 11.
 * Time: 18:00
 */

namespace Controller\Page\Information;

use Controller\Controller;

/**
 * Class Information
 * @package Controller\Page\Information
 */
class Information extends Controller
{
    /**
     * @return mixed
     */
    public function indexAction()
    {
        $informationId = (int)$this->request->getQuery('information_id', 0);

        if (!$informationId) {
            $this->registry->getServer()->redirect('?page=error/error');
        }

        $this->data['information'] = $this->entityManager
            ->getRepository('Entity\Information')
            ->find($informationId);

        return $this->render();
    }
}
