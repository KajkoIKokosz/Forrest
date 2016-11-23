<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Species
 *
 * @ORM\Table(name="species")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\SpeciesRepository")
 */
class Species
{
    
    /**
     * @ORM\ManyToMany(targetEntity="Questions", inversedBy="species")
     * 
     */
    private $question;

    public function __construct() {
        $this->question = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    
    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Groups", inversedBy="species")
     * 
     */
    private $group;
    
    
    
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
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer")
     */
    private $groupId;


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
     * Set groupId
     *
     * @param integer $groupId
     * @return Species
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer 
     */
    public function getGroupId()
    {
        return $this->groupId;
    }
}