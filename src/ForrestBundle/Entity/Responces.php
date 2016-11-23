<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Respoces
 *
 * @ORM\Table(name="responces")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\RespocesRepository")
 */
class Responces
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="responce")
     *
     */
    private $question;
    
     /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="responce")
     * 
     */
    private $user;
    
    
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
     * @ORM\Column(name="responce", type="text")
     */
    private $responce;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="quest_id", type="integer")
     */
    private $questId;

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;


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
     * Set responce
     *
     * @param string $responce
     * @return Respoces
     */
    public function setResponce($responce)
    {
        $this->responce = $responce;

        return $this;
    }

    /**
     * Get responce
     *
     * @return string 
     */
    public function getResponce()
    {
        return $this->responce;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Respoces
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
     * Set questId
     *
     * @param integer $questId
     * @return Respoces
     */
    public function setQuestId($questId)
    {
        $this->questId = $questId;

        return $this;
    }

    /**
     * Get questId
     *
     * @return integer 
     */
    public function getQuestId()
    {
        return $this->questId;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return Respoces
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }
}
