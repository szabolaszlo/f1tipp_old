<?php

namespace Application\HttpProtocol;

/**
 * Class Response
 * @package Application\HttpProtocol
 */
class Response
{
    /**
     * @var string
     */
    protected $content = '';

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function send()
    {
        return $this->content;
    }
}
