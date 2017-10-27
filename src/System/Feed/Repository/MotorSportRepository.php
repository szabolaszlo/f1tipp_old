<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.10.27.
 * Time: 19:53
 */

namespace System\Feed\Repository;

use System\Feed\Collector\ICollector;
use System\Feed\Collector\XMLCollector;
use System\Feed\Item\Item;
use System\Feed\Transformer\ITransformer;
use System\Feed\Transformer\XMLToArray;

/**
 * Class MotorSportRepository
 * @package System\Feed\Repository
 */
class MotorSportRepository implements IRepository
{
    const SOURCE = 'https://hu.motorsport.com/rss/category/f1/news/?eid=hu';

    const TITLE = 'title';

    const DESCRIPTION = 'description';

    const LINK = 'link';

    const PUBLISH_DATE = 'pubDate';

    /**
     * @var ITransformer
     */
    protected $transformer;

    /**
     * @var ICollector
     */
    protected $collector;

    /**
     * @var array
     */
    protected $data = array();

    protected $items = array();

    /**
     * MotorSportRepository constructor.
     */
    public function __construct()
    {
        $this->collector = new XMLCollector();
        $this->transformer = new XMLToArray();

        $sourceData = $this->collector->getData(self::SOURCE);

        $this->data = $this->transformer->transform($sourceData);
    }

    /**
     * @return array
     */
    public function getItems()
    {
        if (empty($this->items)) {
            $this->generateItems();
        }
        return $this->items;
    }

    protected function generateItems()
    {
        foreach ($this->data['channel']['item'] as $item) {
            $itemObj = new Item();

            $itemObj->setId(base64_encode($item[self::PUBLISH_DATE]));
            $itemObj->setTitle($item[self::TITLE]);
            $itemObj->setDescription($item[self::DESCRIPTION]);
            $itemObj->setLink($item[self::LINK]);
            $itemObj->setPublishDate($item[self::PUBLISH_DATE]);
            $itemObj->setImage($item['enclosure']['@attributes']['url']);

            $this->items[$itemObj->getId()] = $itemObj;
        }
    }
}
