<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Species_quest
 *
 * @ORM\Table(name="species_quest")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\Species_questRepository")
 */
class Species_quest
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
     * @ORM\Column(name="species_id", type="integer")
     */
    private $speciesId;

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
     * Set speciesId
     *
     * @param integer $speciesId
     * @return Species_quest
     */
    public function setSpeciesId($speciesId)
    {
        $this->speciesId = $speciesId;

        return $this;
    }

    /**
     * Get speciesId
     *
     * @return integer 
     */
    public function getSpeciesId()
    {
        return $this->speciesId;
    }

    /**
     * Set questId
     *
     * @param integer $questId
     * @return Species_quest
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
