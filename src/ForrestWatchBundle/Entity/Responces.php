<?php

namespace ForrestWatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Responces
 *
 * @ORM\Table(name="responces")
 * @ORM\Entity(repositoryClass="ForrestWatchBundle\Repository\ResponcesRepository")
 */
class Responces
{
     /**
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="responce")
     *
     */
    private $question;
    
     /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="responce")
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
     * @ORM\Column(name="rating", type="integer", nullable=true)
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
     * @return Responces
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
     * Set rating
     *
     * @param integer $rating
     * @return Responces
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

    /**
     * Set question
     *
     * @param \ForrestWatchBundle\Entity\Questions $question
     * @return Responces
     */
    public function setQuestion(\ForrestWatchBundle\Entity\Questions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \ForrestWatchBundle\Entity\Questions 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set user
     *
     * @param \ForrestWatchBundle\Entity\Users $user
     * @return Responces
     */
    public function setUser(\ForrestWatchBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ForrestWatchBundle\Entity\Users 
     */
    public function getUser()
    {
        return $this->user;
    }
}
