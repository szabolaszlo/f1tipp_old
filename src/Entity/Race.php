<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 09.
 * Time: 19:55
 */

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Entity\Repository\Event")
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
 */
class Race extends Event
{

}
