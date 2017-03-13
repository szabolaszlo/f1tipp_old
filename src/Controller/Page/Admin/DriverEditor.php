<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2017. 03. 13.
 * Time: 18:55
 */

namespace Controller\Page\Admin;

use Controller\Controller;
use Entity\Driver;

/**
 * Class DriverEditor
 * @package Controller\Page\Admin
 */
class DriverEditor extends Controller
{
    /**
     * @return mixed
     */
    public function indexAction()
    {
        if (!$this->registry->getUserAuth()->isAdmin()) {
            $this->data['error'] = $this->registry->getLanguage()->get('admin_no_permisson_or_data_error');
            return $this->render();
        }

        $this->data['drivers'] = $this->entityManager
            ->getRepository('Entity\Driver')
            ->findBy(array(), array('point' => 'DESC'));

        $this->data['success'] = $this->session->get('success');
        $this->session->remove('success');

        return $this->render();
    }

    /**
     * @return string
     */
    public function updateAction()
    {
        if (!$this->registry->getUserAuth()->isAdmin()) {
            $this->data['error'] = $this->registry->getLanguage()->get('admin_no_permisson_or_data_error');
            return $this->render();
        }

        if ($this->request->isPost()) {
            $drivers = $this->request->getPost('driver', array());

            foreach ($drivers as $driver) {
                $driverId = (int)$driver['id'];
                $driverEntity = $this->entityManager->getRepository('Entity\Driver')->find($driverId);

                if (!$driverEntity) {
                    $driverEntity = new Driver();
                }

                $driverEntity->setName($driver['name']);
                $driverEntity->setShort($driver['short']);
                $driverEntity->setPoint($driver['point']);
                $driverEntity->setStatus(isset($driver['status']) ? true : false);
                $this->entityManager->persist($driverEntity);
            }

            $this->entityManager->flush();

            $this->session->set('success', $this->registry->getLanguage()->get('admin_information_editor_success'));
            $this->registry->getServer()->redirect('page=admin/driver_editor/index');
        }

        $this->data['error'] = $this->registry->getLanguage()->get('admin_no_permisson_or_data_error');
        return $this->render();
    }

    /**
     * @return string
     */
    public function insertAction()
    {
        if (!$this->registry->getUserAuth()->isAdmin()) {
            $this->data['error'] = $this->registry->getLanguage()->get('admin_no_permisson_or_data_error');
            return $this->render();
        }

        $this->data['drivers'] = array(new Driver());
        
        return $this->render();
    }
}
