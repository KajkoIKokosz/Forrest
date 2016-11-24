<?php

namespace ForrestWatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="ForrestWatchBundle\Repository\RegionRepository")
 */

class Region
{
    public function __toString() {
        return $this->name;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Questions", mappedBy="region")
     */
    private $question;
    
    public function __construct() {
        $this->question = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Region
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
     * Add users
     *
     * @param \ForrestWatchBundle\Entity\Questions $users
     * @return Region
     */
    public function addUser(\ForrestWatchBundle\Entity\Questions $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \ForrestWatchBundle\Entity\Questions $users
     */
    public function removeUser(\ForrestWatchBundle\Entity\Questions $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add question
     *
     * @param \ForrestWatchBundle\Entity\Questions $question
     * @return Region
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
