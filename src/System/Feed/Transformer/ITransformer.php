<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.10.27.
 * Time: 23:08
 */

namespace System\Feed\Transformer;


/**
 * Class XMLToArray
 * @package System\Feed\Transformer
 */
interface ITransformer
{
    /**
     * @param $sourceData
     * @return mixed
     */
    public function transform($sourceData);
}