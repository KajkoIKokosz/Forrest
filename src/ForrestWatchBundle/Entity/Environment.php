<?php

namespace ForrestWatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Environment
 *
 * @ORM\Table(name="environment")
 * @ORM\Entity(repositoryClass="ForrestWatchBundle\Repository\EnvironmentRepository")
 */
class Environment
{
    public function __toString() {
        return $this->name;
    }
    
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
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
     * Add question
     *
     * @param \ForrestWatchBundle\Entity\Questions $question
     * @return Environment
     */
    public function addQuestion(\ForrestWatchBundle\Entity\Questions $question)
    {
        $this->question[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \ForrestWatchBundle\Entity\Questions $question
     */
    public function removeQuestion(\ForrestWatchBundle\Entity\Questions $question)
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
