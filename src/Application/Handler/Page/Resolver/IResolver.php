<?php

namespace Application\Handler\Page\Resolver;

/**
 * Interface IResolver
 * @package Application\Handler\Page\Resolver
 */
interface IResolver
{
    /**
     * @param $url
     */
    public function resolve($url);

    public function getPage();

    public function getAction();
}
