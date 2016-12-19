<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`event`")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="event_type", type="string", columnDefinition="ENUM('race', 'qualify', 'event')"))
 * @ORM\DiscriminatorMap({"event" = "Event", "race" = "Race", "qualify" = "Qualify"})
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
 */
class Event
{
    /**
     * @ORM\Column(name="id", type="integer", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="event_order", type="integer", length=2, nullable=false)
     */
    protected $eventOrder;

    /**
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    protected $name;

    /**
     * @ORM\Column(name="date_time", type="datetime", nullable=false)
     */
    protected $date_time;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEventOrder()
    {
        return $this->eventOrder;
    }

    /**
     * @param mixed $eventOrder
     */
    public function setEventOrder($eventOrder)
    {
        $this->eventOrder = $eventOrder;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->date_time;
    }

    /**
     * @param mixed $date_time
     */
    public function setDateTime($date_time)
    {
        $this->date_time = $date_time;
    }

    /**
     * Sorry this WTF,
     * but Doctrine can't able to access the discriminator column
     * @return string ('qualify'|'race')
     */
    public function getType()
    {
        return lcfirst(substr(strrchr(get_class($this), "\\"), 1));
    }
}
