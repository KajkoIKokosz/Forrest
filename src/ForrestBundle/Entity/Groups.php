<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Groups
 *
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\GroupsRepository")
 */
class Groups
{
    public function __toString() {
        return $this->name;
    }
    
    /**
     * @ORM\OneToMany(targetEntity="Species", mappedBy="group")
     */
    private $species;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Questions", mappedBy="group")
     */
    private $question;
    

    public function __construct() {
        $this->species = new ArrayCollection();
        $this->question = new ArrayCollection();
    }
    
    
    /**
     * @ORM\ManyToOne(targetEntity="KingDom", inversedBy="group")
     * 
     */
    private $kingdom;
    
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
     * 
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="kingdom_id", type="integer")
     */
    private $kingdomId;


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
     * @return Groups
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
     * Set kingdomId
     *
     * @param integer $kingdomId
     * @return Groups
     */
    public function setKingdomId($kingdomId)
    {
        $this->kingdomId = $kingdomId;

        return $this;
    }

    /**
     * Get kingdomId
     *
     * @return integer 
     */
    public function getKingdomId()
    {
        return $this->kingdomId;
    }

    /**
     * Add species
     *
     * @param \ForrestBundle\Entity\Species $species
     * @return Groups
     */
    public function addSpecy(\ForrestBundle\Entity\Species $species)
    {
        $this->species[] = $species;

        return $this;
    }

    /**
     * Remove species
     *
     * @param \ForrestBundle\Entity\Species $species
     */
    public function removeSpecy(\ForrestBundle\Entity\Species $species)
    {
        $this->species->removeElement($species);
    }

    /**
     * Get species
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * Add question
     *
     * @param \ForrestBundle\Entity\Questions $question
     * @return Groups
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

    /**
     * Set kingdom
     *
     * @param \ForrestBundle\Entity\KingDom $kingdom
     * @return Groups
     */
    public function setKingdom(\ForrestBundle\Entity\KingDom $kingdom = null)
    {
        $this->kingdom = $kingdom;

        return $this;
    }

    /**
     * Get kingdom
     *
     * @return \ForrestBundle\Entity\KingDom 
     */
    public function getKingdom()
    {
        return $this->kingdom;
    }
}
