<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 22.
 * Time: 10:24
 */

namespace System\Language;

/**
 * Class Language
 * @package System\Language
 */
class Language
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var string
     */
    protected $path;

    /**
     * Language constructor.
     * @param $language
     */
    public function __construct($language)
    {
        $this->path = __DIR__ . '/Translation/';

        $_ = array();
        
        ob_start();
        require_once($this->path . $language . '.php');
        ob_end_clean();

        if (isset($_) && !empty($_)) {
            $this->data = array_merge($this->data, $_);
        }
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return isset($this->data[$key])
            ? $this->data[$key]
            : $key;
    }
}
