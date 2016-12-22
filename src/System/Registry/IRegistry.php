<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 17.
 * Time: 19:37
 */

namespace System\Registry;

use Application\HttpProtocol\ICookie;
use Application\HttpProtocol\Server;
use System\FormHelper\FormHelper;
use System\Language\Language;
use System\Rule\Rule;
use System\UserAuthentication\Authentication;

/**
 * Interface IRegistry
 * @package System\Registry
 */
interface IRegistry
{
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
}
