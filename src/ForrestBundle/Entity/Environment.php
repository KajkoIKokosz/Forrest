<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Environment
 *
 * @ORM\Table(name="environment")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\EnvironmentRepository")
 */
class Environment
{
    /**
      * @ORM\ManyToMany(targetEntity="Questions", inversedBy="environment")
      * 
      */
    private $question;

    public function __construct() {
        $this->quest_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return Environment
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add quest_id
     *
     * @param \ForrestBundle\Entity\Questions $questId
     * @return Environment
     */
    public function addQuestId(\ForrestBundle\Entity\Questions $questId)
    {
        $this->quest_id[] = $questId;

        return $this;
    }

    /**
     * Remove quest_id
     *
     * @param \ForrestBundle\Entity\Questions $questId
     */
    public function removeQuestId(\ForrestBundle\Entity\Questions $questId)
    {
        $this->quest_id->removeElement($questId);
    }

    /**
     * Get quest_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestId()
    {
        return $this->quest_id;
    }

    /**
     * Add question
     *
     * @param \ForrestBundle\Entity\Questions $question
     * @return Environment
     */
    public function addQuestion(\ForrestBundle\Entity\Questions $question)
    {
        $this->question[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \ForrestBundle\Entity\Questions $question
     */
    public function removeQuestion(\ForrestBundle\Entity\Questions $question)
    {
        $this->question->removeElement($question);
    }

    /**
     * Get question
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
