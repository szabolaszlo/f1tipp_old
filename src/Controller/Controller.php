<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 08.
 * Time: 19:03
 */

namespace Controller;

use Application\HttpProtocol\IRequest;
use Application\HttpProtocol\ISession;
use Doctrine\ORM\EntityManagerInterface;
use System\Registry\IRegistry;

/**
 * Class Controller
 * @package Controller
 */
abstract class Controller
{
    /**
     * @var IRequest
     */
    protected $request;

    /**
     * @var ISession
     */
    protected $session;

    /**
     * @var \Twig_Environment
     */
    protected $renderer;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManger;

    /**
     * @var IRegistry
     */
    protected $registry;

    /**
     * @var string
     */
    protected $id;

    /**
     * Controller constructor.
     * @param IRegistry $registry
     */
    public function __construct(IRegistry $registry)
    {
        $this->registry = $registry;

        $this->request = $this->registry->getRequest();
        $this->session = $this->registry->getSession();
        $this->renderer = $this->registry->getRenderer();
        $this->entityManger = $this->registry->getEntityManger();

        $reflect = new \ReflectionClass($this);
        $this->id = lcfirst($reflect->getShortName());
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function indexAction()
    {
        return '';
    }
}
