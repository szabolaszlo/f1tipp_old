<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.10.27.
 * Time: 23:46
 */

namespace System\Feed\Storage;

use Doctrine\ORM\EntityManagerInterface;
use Entity\Feed;
use System\Feed\Item\Item;

/**
 * Class Doctrine
 * @package System\Feed\Storage
 */
class Doctrine implements IStorage
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * Doctrine constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Item $item
     */
    public function setItem(Item $item)
    {
        $existFeed = $this
            ->entityManager
            ->getRepository(Feed::class)
            ->find($item->getId());

        if ($existFeed) {
            return;
        }

        $feed = new Feed();

        $feed->setId($item->getId());
        $feed->setTitle($item->getTitle());
        $feed->setDescription($item->getDescription());
        $feed->setLink($item->getLink());
        $feed->setImage($item->getImage());
        $feed->setPublishDate($item->getPublishDate());

        $this->entityManager->persist($feed);
    }

    public function save()
    {
        $this->entityManager->flush();
    }
}
