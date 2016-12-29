<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 26.
 * Time: 20:49
 */

namespace System\ResultTable\Type;

use Doctrine\ORM\EntityManagerInterface;
use Entity\Bet;
use Entity\Event;
use System\Calculator\ICalculator;
use System\Language\Language;
use System\Registry\IRegistry;
use System\ResultTable\Decorator\IDecorator;

/**
 * Class Full
 * @package System\ResultTable\Type
 */
class Full implements ITableType
{
    /**
     * @var IRegistry
     */
    protected $registry;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var \Twig_Environment
     */
    protected $renderer;

    /**
     * @var ICalculator
     */
    protected $calculator;

    /**
     * @var IDecorator
     */
    protected $decorator;

    /**
     * @var Language
     */
    protected $language;

    /**
     * @var array
     */
    protected $data = array();

    /**
     * Full constructor.
     * @param IRegistry $registry
     * @param ICalculator $calculator
     * @param IDecorator $decorator
     */
    public function __construct(IRegistry $registry, ICalculator $calculator, IDecorator $decorator)
    {
        $this->registry = $registry;
        $this->calculator = $calculator;
        $this->decorator = $decorator;
        
        $this->entityManager = $this->registry->getEntityManager();
        $this->renderer = $this->registry->getRenderer();
        $this->data['language'] = $this->registry->getLanguage();
    }

    /**
     * @param Event $event
     * @return string
     */
    public function getTable(Event $event)
    {
        $this->data['result'] = $this->entityManager
            ->getRepository('Entity\Result')
            ->findOneBy(array('event' => $event));

        $bets = $this->entityManager
            ->getRepository('Entity\Bet')
            ->findBy(array('event_id' => $event));

        $sortMap = array();

        /** @var Bet $bet */
        foreach ($bets as $bet) {
            $this->calculator->calculateBetPoints($bet, $this->data['result']);
            $this->decorator->decorate($bet);
            $sortMap[] = $bet->getPoint();
        }

        array_multisort($sortMap, SORT_DESC, $bets, SORT_DESC);

        $this->data['bets'] = $bets;

        return $this->render();
    }

    /**
     * @return string
     */
    protected function render()
    {
        $templatePath = strtolower(get_class($this)) . '.tpl';
        return $this->renderer->render($templatePath, $this->data);
    }
}
