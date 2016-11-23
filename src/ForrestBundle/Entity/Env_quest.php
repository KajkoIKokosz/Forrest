<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Env_quest
 *
 * @ORM\Table(name="env_quest")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\Env_questRepository")
 */
class Env_quest
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
     * @ORM\Column(name="envir_id", type="integer")
     */
    private $envirId;

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
     * Set envirId
     *
     * @param integer $envirId
     * @return Env_quest
     */
    public function setEnvirId($envirId)
    {
        $this->envirId = $envirId;

        return $this;
    }

    /**
     * Get envirId
     *
     * @return integer 
     */
    public function getEnvirId()
    {
        return $this->envirId;
    }

    /**
     * Set questId
     *
     * @param integer $questId
     * @return Env_quest
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
