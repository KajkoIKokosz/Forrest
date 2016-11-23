<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\QuestionsRepository")
 */
class Questions
{
    
    /**
     * @ORM\OneToMany(targetEntity="Pictures", mappedBy="question")
     */
    private $picture;
    
    /**
     * @ORM\OneToMany(targetEntity="Responces", mappedBy="question")
     */
    private $responce;
    
    /**
     * @ORM\ManyToMany(targetEntity="Species", mappedBy="question")
     */
    private $species;
    
    /**
     * @ORM\ManyToOne(targetEntity="Groups", inversedBy="question")
     * 
     */
    private $group;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="question")
     *
     */
    private $user;
    
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Region", inversedBy="question")
     * 
     */
    private $region;

    /**
     * @ORM\ManyToMany(targetEntity="Environment", mappedBy="question")
     */
    private $environment;

    
    public function __construct() {
        $this->region = new ArrayCollection();
        $this->environment = new ArrayCollection();
        $this->species = new ArrayCollection();
        $this->responce = new ArrayCollection();
        $this->picture = new ArrayCollection();
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
     * @ORM\Column(name="topic", type="string", length=255)
     */
    private $topic;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text")
     */
    private $question;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

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
     * Set topic
     *
     * @param string $topic
     * @return Questions
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return string 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return Questions
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Questions
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set groupId
     *
     * @param integer $groupId
     * @return Questions
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

    

    

    /**
     * Add env_id
     *
     * @param \ForrestBundle\Entity\Environment $envId
     * @return Questions
     */
    public function addEnvId(\ForrestBundle\Entity\Environment $envId)
    {
        $this->env_id[] = $envId;

        return $this;
    }

    /**
     * Remove env_id
     *
     * @param \ForrestBundle\Entity\Environment $envId
     */
    public function removeEnvId(\ForrestBundle\Entity\Environment $envId)
    {
        $this->env_id->removeElement($envId);
    }

    /**
     * Get env_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnvId()
    {
        return $this->env_id;
    }
}
