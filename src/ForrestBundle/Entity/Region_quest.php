<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region_quest
 *
 * @ORM\Table(name="region_quest")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\Region_questRepository")
 */
class Region_quest
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="region_id", type="integer")
     */
    private $regionId;

    /**
     * @var int
     *
     * @ORM\Column(name="quest_id", type="integer")
     */
    private $questId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set regionId
     *
     * @param integer $regionId
     * @return Region_quest
     */
    public function setRegionId($regionId)
    {
        $this->regionId = $regionId;

        return $this;
    }

    /**
     * Get regionId
     *
     * @return integer 
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Set questId
     *
     * @param integer $questId
     * @return Region_quest
     */
    public function setQuestId($questId)
    {
        $this->questId = $questId;

        return $this;
    }

    /**
     * Get questId
     *
     * @return integer 
     */
    public function getQuestId()
    {
        return $this->questId;
    }
}
