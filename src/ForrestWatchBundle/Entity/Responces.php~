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
}
