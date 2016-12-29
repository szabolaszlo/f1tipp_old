<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 29.
 * Time: 21:13
 */

namespace System\Cache;

use System\Cache\Strategy\IStrategy;

/**
 * Class Cache
 * @package System\Cache
 */
class Cache
{
    /**
     * @var IStrategy
     */
    protected $strategy;

    /**
     * Cache constructor.
     * @param IStrategy $strategy
     */
    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @param $id
     * @return bool|string
     */
    public function getCache($id)
    {
        return $this->strategy->getCache($id);
    }

    /**
     * @param $id
     * @param $content
     */
    public function setCache($id, $content)
    {
        $this->strategy->setCache($id, $content);
    }
}
