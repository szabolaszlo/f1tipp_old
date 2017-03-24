<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 03. 11.
 * Time: 18:00
 */

namespace Controller\Page\Information;

use Controller\Controller;
use Doctrine\ORM\EntityRepository;

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

        $informationTitle = (string)$this->request->getQuery('information_title', '');

        if (!$informationId && !$informationTitle) {
            $this->registry->getServer()->redirect('page=error/error');
        }

        /** @var EntityRepository $repository */
        $repository = $this->entityManager->getRepository('Entity\Information');

        $this->data['information'] = $informationId
            ? $repository->find($informationId)
            : $repository->findOneBy(array('title' => $informationTitle));

        if (!$this->data['information']) {
            $this->registry->getServer()->redirect('page=error/error');
        }

        return $this->render();
    }
}
