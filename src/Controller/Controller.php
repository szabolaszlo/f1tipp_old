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
    protected $entityManager;

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
        $this->entityManager = $this->registry->getEntityManager();

        $this->templatePath = $this->generateTemplatePath();

        $reflect = new \ReflectionClass($this);
        $this->id = lcfirst($reflect->getShortName());

        $this->data['language'] = $this->registry->getLanguage();
        $this->data['id'] = $this->id;
        $this->data['visibility'] = $this->session->get($this->id . 'Status', 'block');
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
        return $this->render();
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
    protected function generateTemplatePath()
    {
        $path = preg_replace('/\B([A-Z])/', '_$1', get_class($this));
        return strtolower($path) . '.tpl';
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)($this->session->get($this->id . 'Status') !== 'off');
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->renderer->render($this->templatePath, $this->data);
    }
}
