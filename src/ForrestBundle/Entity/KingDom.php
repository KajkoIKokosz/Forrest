<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * KingDom
 *
 * @ORM\Table(name="king_dom")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\KingDomRepository")
 */
class KingDom
{
    public function __toString() {
        return $this->name;
    }
    
    /**
     * @ORM\OneToMany(targetEntity="Groups", mappedBy="kingdom")
     */
    private $group;
  
    public function __construct() {
        $this->group = new ArrayCollection();
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
     * @return KingDom
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
     * Add group_id
     *
     * @param \ForrestBundle\Entity\Groups $groupId
     * @return KingDom
     */
    public function addGroupId(\ForrestBundle\Entity\Groups $groupId)
    {
        $this->group_id[] = $groupId;

        return $this;
    }

    /**
     * Remove group_id
     *
     * @param \ForrestBundle\Entity\Groups $groupId
     */
    public function removeGroupId(\ForrestBundle\Entity\Groups $groupId)
    {
        $this->group_id->removeElement($groupId);
    }

    /**
     * Get group_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Add group
     *
     * @param \ForrestBundle\Entity\Groups $group
     * @return KingDom
     */
    public function addGroup(\ForrestBundle\Entity\Groups $group)
    {
        $this->group[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \ForrestBundle\Entity\Groups $group
     */
    public function removeGroup(\ForrestBundle\Entity\Groups $group)
    {
        $this->group->removeElement($group);
    }

    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
