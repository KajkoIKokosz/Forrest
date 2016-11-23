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
}