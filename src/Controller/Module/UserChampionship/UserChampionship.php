<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 18:06
 */

namespace Controller\Module\UserChampionship;

use Controller\Controller;
use Entity\User;
use System\Cache\Cache;
use System\Calculator\ICalculator;
use System\Registry\IRegistry;

/**
 * Class UserChampionship
 * @package Controller\Module\UserChampionship
 */
class UserChampionship extends Controller
{
    /**
     * @var ICalculator
     */
    protected $calculator;

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * Betting constructor.
     * @param IRegistry $registry
     */
    public function __construct(IRegistry $registry)
    {
        parent::__construct($registry);

        $this->calculator = $this->registry->getCalculator();
        $this->cache = $this->registry->getCache();
    }

    /**
     * @return mixed
     */
    public function indexAction()
    {
        $cachedContent = $this->cache->getCache($this->getCacheId());

        if ($cachedContent) {
            return $cachedContent;
        }

        $this->data['users'] = $this->entityManager->getRepository('Entity\User')->findAll();

        $sortMap = array();

        /** @var User $user */
        foreach ($this->data['users'] as $user) {
            $this->calculator->calculateUserPoints($user);
            $sortMap[] = $user->getPoint();
        }

        array_multisort($sortMap, SORT_DESC, $this->data['users'], SORT_DESC);

        /** @var User $user */
        foreach ($this->data['users'] as $key => $user) {
            $user->setPointDifference(
                '(' . (isset($sortMap[max(0, $key - 1)]) ? $sortMap[max(0, $key - 1)] - $user->getPoint() : 0) . ' / '
                . (isset($sortMap[0]) ? $sortMap[0] - $user->getPoint() : 0) . ')'
            );
        }

        $this->data['recordTypes'] = array(
            'qualify' => $this->calculator->getRecordsByType('qualify'),
            'race' => $this->calculator->getRecordsByType('race')
        );

        $renderedContent = $this->render();

        $this->cache->setCache($this->getCacheId(), $renderedContent);

        return $renderedContent;
    }

    /**
     * @return string
     */
    protected function getCacheId()
    {
        return
            'userChampionship.'
            . count($this->entityManager->getRepository('Entity\Result')->findAll()) . '.'
            . $this->data['visibility'];
    }
}
