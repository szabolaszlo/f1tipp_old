<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 17.
 * Time: 19:37
 */

namespace System\Registry;
use Application\HttpProtocol\Server;
use System\Rule\Rule;
use System\Rule\RuleType\Qualify as QualifyRule;
use System\Rule\RuleType\Race as RaceRule;

/**
 * Interface IRegistry
 * @package System\Registry
 */
interface IRegistry
{
    public function getCookie();

    public function getUserAuth();

    public function getServer();
    
    public function getRule();
}
