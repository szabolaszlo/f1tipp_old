<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 17.
 * Time: 19:25
 */

namespace System\Registry;

use Application\HttpProtocol\ICookie;
use Application\HttpProtocol\IRequest;
use Application\HttpProtocol\ISession;
use Application\HttpProtocol\Server;
use Doctrine\ORM\EntityManagerInterface;
use System\Rule\Rule;
use System\Rule\RuleType\Qualify as QualifyRule;
use System\Rule\RuleType\Race as RaceRule;
use System\UserAuthentication\Authentication;

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
     * @var ICookie
     */
    protected $cookie;

    /**
     * @var Authentication
     */
    protected $userAuth;

    /**
     * @var Server
     */
    protected $server;

    /**
     * @var Rule
     */
    protected $rule;

    /**
     * Registry constructor.
     * @param IRequest $request
     * @param ISession $session
     * @param $entityManager
     * @param ICookie $cookie
     */
    public function __construct(IRequest $request, ISession $session, $entityManager, ICookie $cookie)
    {
        $this->request = $request;
        $this->session = $session;
        $this->entityManger = $entityManager;
        $this->cookie = $cookie;
    }

    /**
     * @return ICookie
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * @return Authentication
     */
    public function getUserAuth()
    {
        if (!$this->userAuth) {
            $this->userAuth = new Authentication($this->entityManger, $this->cookie);
        }
        return $this->userAuth;
    }

    /**
     * @return Server
     */
    public function getServer()
    {
        if (!$this->server) {
            $this->server = new Server();
        }
        return $this->server;
    }

    /**
     * @return Rule
     */
    public function getRule()
    {
        if (!$this->rule) {
            $ruleTypes = array(
                'qualify' => new QualifyRule(),
                'race' => new RaceRule()
            );

            $this->rule = new Rule($ruleTypes);
        }
        
        return $this->rule;
    }
}
