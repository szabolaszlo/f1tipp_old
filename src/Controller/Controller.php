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
     * @var array
     */
    protected $data = array();

    /**
     * @var string
     */
    protected $templatePath;

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

        $this->data['language'] = $this->registry->getLanguage();

        $this->templatePath = strtolower(get_class($this)) . '.tpl';

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

    /**
     * @param $templatePath
     */
    public function setTemplate($templatePath)
    {
        $this->templatePath = $templatePath;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->renderer->render($this->templatePath, $this->data);
    }
}
