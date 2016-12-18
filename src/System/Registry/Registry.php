<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 17.
 * Time: 19:25
 */

namespace System\Registry;

use Application\HttpProtocol\IRequest;
use Application\HttpProtocol\ISession;
use Doctrine\ORM\EntityManagerInterface;
use System\EventManager\EventManager;

/**
 * Class Registry
 * @package System\Registry
 */
class Registry implements IRegistry
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
     * @var EntityManagerInterface
     */
    protected $entityManger;

    /**
     * @var EventManager
     */
    protected $eventManager;

    /**
     * Registry constructor.
     * @param IRequest $request
     * @param ISession $session
     * @param $entityManager
     */
    public function __construct(IRequest $request, ISession $session, $entityManager)
    {
        $this->request = $request;
        $this->session = $session;
        $this->entityManger = $entityManager;
    }

    /**
     * @return EventManager
     */
    public function getEventManager()
    {
        if (!$this->eventManager) {
            $this->eventManager = new EventManager($this->entityManger);
        }
        return $this->eventManager;
    }
}
