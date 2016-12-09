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
     * @var string
     */
    protected $id;

    /**
     * Page constructor.
     * @param IRequest $request
     * @param ISession $session
     * @param \Twig_Environment $renderer
     * @param $entityManager
     */
    public function __construct(IRequest $request, ISession $session, \Twig_Environment $renderer, $entityManager)
    {
        $this->request = $request;
        $this->session = $session;
        $this->renderer = $renderer;
        $this->entityManger;

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
