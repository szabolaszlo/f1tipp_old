<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 17.
 * Time: 19:37
 */

namespace System\Registry;

use Application\HttpProtocol\ICookie;
use Application\HttpProtocol\IRequest;
use Application\HttpProtocol\ISession;
use Application\HttpProtocol\Server;
use Doctrine\ORM\EntityManagerInterface;
use System\Cache\Cache;
use System\Calculator\ICalculator;
use System\FormHelper\FormHelper;
use System\Language\Language;
use System\ResultTable\ResultTable;
use System\Rule\Rule;
use System\UserAuthentication\Authentication;

/**
 * Interface IRegistry
 * @package System\Registry
 */
interface IRegistry
{
    /**
     * @return IRequest
     */
    public function getRequest();

    /**
     * @return ISession
     */
    public function getSession();
    /**
     * @return EntityManagerInterface
     */
    public function getEntityManager();

    /**
     * @return \Twig_Environment
     */
    public function getRenderer();

    /**
     * @return ICookie
     */
    public function getCookie();

    /**
     * @return Authentication
     */
    public function getUserAuth();

    /**
     * @return Server
     */
    public function getServer();

    /**
     * @return Rule
     */
    public function getRule();

    /**
     * @return FormHelper
     */
    public function getFormHelper();

    /**
     * @return Language
     */
    public function getLanguage();
    
    /**
     * @return ICalculator
     */
    public function getCalculator();

    /**
     * @return ResultTable
     */
    public function getResultTable();

    /**
     * @return Cache
     */
    public function getCache();
}
