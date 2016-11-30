<?php

namespace ForrestWatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Kingdom
 *
 * @ORM\Table(name="king_dom")
 * @ORM\Entity(repositoryClass="ForrestWatchBundle\Repository\KingdomRepository")
 */
class Kingdom
{
    public function __toString() {
        return $this->name;
    }
    // R E L A C J E
    
    /**
     * @ORM\OneToMany(targetEntity="Phylum", mappedBy="kingdom")
     */
    private $phylum;
  
    public function __construct() {
        $this->phylum = new ArrayCollection();
    }
    
    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Questions", mappedBy="kingdom")
     */
    private $questions;
    
    
    // S K Ł A D O W E
    
    
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
     * @return Kingdom
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
     * Add phylum
     *
     * @param \ForrestWatchBundle\Entity\Phylum $phylum
     * @return Kingdom
     */
    public function addPhylum(\ForrestWatchBundle\Entity\Phylum $phylum)
    {
        $this->phylum[] = $phylum;

        return $this;
    }

    /**
     * Remove phylum
     *
     * @param \ForrestWatchBundle\Entity\Phylum $phylum
     */
    public function removePhylum(\ForrestWatchBundle\Entity\Phylum $phylum)
    {
        $this->phylum->removeElement($phylum);
    }

    /**
     * Get phylum
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhylum()
    {
        return $this->phylum;
    }

    /**
     * Add questions
     *
     * @param \ForrestWatchBundle\Entity\Questions $questions
     * @return Kingdom
     */
    public function addQuestion(\ForrestWatchBundle\Entity\Questions $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \ForrestWatchBundle\Entity\Questions $questions
     */
    public function removeQuestion(\ForrestWatchBundle\Entity\Questions $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
