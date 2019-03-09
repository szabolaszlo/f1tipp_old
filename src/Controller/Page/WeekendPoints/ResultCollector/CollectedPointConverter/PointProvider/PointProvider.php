<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.12.29.
 * Time: 17:29
 */

namespace Controller\Page\WeekendPoints\ResultCollector\CollectedPointConverter\PointProvider;

/**
 * Class PointProvider
 * @package Controller\Page\WeekendPoints\ResultCollector\CollectedPointConverter\PointProvider
 */
class PointProvider
{
    const PLACE_1 = 15;
    const PLACE_2 = 10;
    const PLACE_3 = 5;
    const PLACE_4 = 0;
    const PLACE_5 = 0;
    const PLACE_6 = 0;
    const PLACE_7 = 0;
    const PLACE_8 = 0;
    const PLACE_9 = 0;
    const PLACE_10 = 0;

    const AWARDED_PLACES = 10;

    protected $placePoints = array(
        1 => self::PLACE_1,
        2 => self::PLACE_2,
        3 => self::PLACE_3,
        4 => self::PLACE_4,
        5 => self::PLACE_5,
        6 => self::PLACE_6,
        7 => self::PLACE_7,
        8 => self::PLACE_8,
        9 => self::PLACE_9,
        10 => self::PLACE_10,

    );

    /**
     * @param $place
     * @return int
     */
    public function getPlacePoint($place)
    {
        return isset($this->placePoints[$place])
            ? $this->placePoints[$place]
            : 0;
    }

    /**
     * @return array
     */
    public function getPlacePoints()
    {
        return $this->placePoints;
    }
}
