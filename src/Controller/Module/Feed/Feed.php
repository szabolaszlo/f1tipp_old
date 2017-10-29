<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.10.28.
 * Time: 14:17
 */

namespace Controller\Module\Feed;

use Controller\Controller;
use Entity\Feed as FeedEntity;
use System\Cache\Cache;
use System\Registry\IRegistry;

/**
 * Class Feed
 * @package Controller\Module\Feed
 */
class Feed extends Controller
{
    const FEED_LIMIT = 31;

    const CACHE_ID = 'feeds';

    /**
     * @var Cache
     */
    protected $cache;

    /**
     * Feed constructor.
     * @param IRegistry $registry
     */
    public function __construct(IRegistry $registry)
    {
        parent::__construct($registry);

        $this->cache = $this->registry->getCache();
    }

    /**
     * @return string
     */
    public function indexAction()
    {
        $cachedContent = $this->cache->getCache(self::CACHE_ID);

        if ($cachedContent) {
            return $cachedContent;
        }

        $this->data['feeds'] = $this->entityManager
            ->getRepository(FeedEntity::class)
            ->findBy(array(), array('id' => 'DESC'), self::FEED_LIMIT);

        unset($this->data['feeds'][0]);

        $renderedContent = $this->render();

        $this->cache->setCache(self::CACHE_ID, $renderedContent);

        return $renderedContent;
    }
}
