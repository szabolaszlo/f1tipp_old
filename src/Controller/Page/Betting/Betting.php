<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 20.
 * Time: 21:18
 */

namespace Controller\Page\Betting;

use Controller\Controller;
use Entity\Qualify;
use Entity\Repository\Event;
use System\Rule\RuleType\IRuleType;

/**
 * Class Betting
 * @package Controller\Page\Betting
 */
class Betting extends Controller
{
    /**
     * @return mixed
     */
    public function indexAction()
    {
        /** @var Event $repository */
        $repository = $this->entityManger->getRepository('Entity\Qualify');

        /** @var Qualify $qualify */
        $qualify = $repository->getNextEvent();

        /** @var IRuleType $qualifyRule */
        $qualifyRule = $this->registry->getRule()->getRuleType('qualify');

        $qualifyAttributes = $qualifyRule->getAllAttribute();
        
        return $this->renderer->render(
            'controller/page/betting/betting.tpl',
            array(
                'qualify' => $qualify,
                'qualifyAttributes' =>$qualifyAttributes,
            )
        );
    }
}
