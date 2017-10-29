<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.10.28.
 * Time: 0:08
 */

namespace System\Feed\Storage;

use System\Feed\Item\Item;

/**
 * Class Doctrine
 * @package System\Feed\Storage
 */
interface IStorage
{
    /**
     * @param Item $item
     */
    public function setItem(Item $item);

    public function save();
}
