<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 20.
 * Time: 21:18
 */

namespace Controller\Page\Betting;

use Application\HttpProtocol\IRequest;
use Application\HttpProtocol\ISession;
use Controller\Controller;
use Entity\Qualify;
use Entity\Race;
use Entity\Repository\Event;
use Entity\User;
use System\FormHelper\FormHelper;
use System\Registry\IRegistry;

/**
 * Class Betting
 * @package Controller\Page\Betting
 */
class Betting extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Qualify
     */
    protected $qualify;

    /**
     * @var array
     */
    protected $qualifyAttributes = array();

    /**
     * @var Race
     */
    protected $race;

    /**
     * @var array
     */
    protected $raceAttributes = array();

    /**
     * @var FormHelper
     */
    protected $formHelper;

    /**
     * Betting constructor.
     * @param IRequest $request
     * @param ISession $session
     * @param \Twig_Environment $renderer
     * @param $entityManager
     * @param IRegistry $registry
     */
    public function __construct(
        IRequest $request,
        ISession $session,
        \Twig_Environment $renderer,
        $entityManager,
        IRegistry $registry
    )
    {
        parent::__construct($request, $session, $renderer, $entityManager, $registry);

        //User
        $this->user = $this->registry->getUserAuth()->getLoggedUser();

        //Qualify
        /** @var Event $repository */
        $repository = $this->entityManger->getRepository('Entity\Qualify');
        $this->qualify = $repository->getNextEvent();

        //QualifyAttributes
        $this->qualifyAttributes = $this->registry->getRule()->getRuleType('qualify')->getAllAttribute();

        //Race
        $repository = $this->entityManger->getRepository('Entity\Race');
        $this->race = $repository->getNextEvent();

        //RaceAttributes
        $this->raceAttributes = $this->registry->getRule()->getRuleType('race')->getAllAttribute();

        //SelectOption
        $this->formHelper = $this->registry->getFormHelper();
    }

    /**
     * @return mixed
     */
    public function indexAction()
    {

        return $this->renderer->render(
            'controller/page/betting/betting.tpl',
            array(
                'events' => array(
                    'qualify' => array(
                        'event' => $this->qualify,
                        'eventAttributes' => $this->qualifyAttributes,
                    ),
                    'race' => array(
                        'event' => $this->race,
                        'eventAttributes' => $this->raceAttributes,
                    )
                ),
                'formHelper' => $this->formHelper,
            )
        );
    }
}
