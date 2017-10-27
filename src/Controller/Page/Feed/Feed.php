<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.10.27.
 * Time: 20:33
 */

namespace Controller\Page\Feed;

use Controller\Controller;
use System\Feed\Handler;
use System\Feed\Repository\MotorSportRepository;
use System\Feed\Storage\Doctrine;

/**
 * Class Feed
 * @package Controller\Page\Feed
 */
class Feed extends Controller
{
    /**
     * @return mixed
     */
    public function index2Action()
    {

        $repositories = array(new MotorSportRepository());

        $storage = new Doctrine($this->entityManager);

        $handler = new Handler($repositories, $storage);

        $feeds = $handler->getItems();

        $handler->saveItems($feeds);

        return $this->render();
    }
}