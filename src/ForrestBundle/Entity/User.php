<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\UserRepository")
 */
class User
{
    
    /**
     * @ORM\OneToMany(targetEntity="Responces", mappedBy="user")
     */
    private $responce;
    // ...

    /**
     * @ORM\OneToMany(targetEntity="Questions", mappedBy="user")
     */
    private $question;
    // ...

    public function __construct() {
        $this->question = new ArrayCollection();
        $this->responce = new ArrayCollection();
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
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;


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
     * Set login
     *
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add responce
     *
     * @param \ForrestBundle\Entity\Responces $responce
     * @return User
     */
    public function addResponce(\ForrestBundle\Entity\Responces $responce)
    {
        $this->responce[] = $responce;

        return $this;
    }

    /**
     * Remove responce
     *
     * @param \ForrestBundle\Entity\Responces $responce
     */
    public function removeResponce(\ForrestBundle\Entity\Responces $responce)
    {
        $this->responce->removeElement($responce);
    }

    /**
     * Get responce
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponce()
    {
        return $this->responce;
    }

    /**
     * Add question
     *
     * @param \ForrestBundle\Entity\Questions $question
     * @return User
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
}
