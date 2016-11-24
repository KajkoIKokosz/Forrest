<?php

namespace ForrestWatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Species
 *
 * @ORM\Table(name="species")
 * @ORM\Entity(repositoryClass="ForrestWatchBundle\Repository\SpeciesRepository")
 */
class Species
{
    /**
     * @ORM\ManyToMany(targetEntity="Questions", inversedBy="species")
     * 
     */
    private $question;
    public function __construct() {
        $this->question = new ArrayCollection();
    }
    
    /**
     * @ORM\ManyToOne(targetEntity="Phylum", inversedBy="species")
     * 
     */
    private $phylum;
    
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
     * @var string
     *
     * @ORM\Column(name="latinName", type="string", length=255, nullable=true, unique=true)
     */
    private $latinName;


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
     * @return Species
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
     * Set latinName
     *
     * @param string $latinName
     * @return Species
     */
    public function setLatinName($latinName)
    {
        $this->latinName = $latinName;

        return $this;
    }

    /**
     * Get latinName
     *
     * @return string 
     */
    public function getLatinName()
    {
        return $this->latinName;
    }

    /**
     * Add question
     *
     * @param \ForrestWatchBundle\Entity\Questions $question
     * @return Species
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

    /**
     * Set phylum
     *
     * @param \ForrestWatchBundle\Entity\Phylum $phylum
     * @return Species
     */
    public function setPhylum(\ForrestWatchBundle\Entity\Phylum $phylum = null)
    {
        $this->phylum = $phylum;

        return $this;
    }

    /**
     * Get phylum
     *
     * @return \ForrestWatchBundle\Entity\Phylum 
     */
    public function getPhylum()
    {
        return $this->phylum;
    }
}
