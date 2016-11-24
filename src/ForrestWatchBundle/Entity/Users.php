<?php

namespace ForrestWatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="ForrestWatchBundle\Repository\UsersRepository")
 */
class Users
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
     * @return Users
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
     * @return Users
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
     * @return Users
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
     * @param \ForrestWatchBundle\Entity\Responces $responce
     * @return Users
     */
    public function addResponce(\ForrestWatchBundle\Entity\Responces $responce)
    {
        $this->responce[] = $responce;

        return $this;
    }

    /**
     * Remove responce
     *
     * @param \ForrestWatchBundle\Entity\Responces $responce
     */
    public function removeResponce(\ForrestWatchBundle\Entity\Responces $responce)
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
     * @param \ForrestWatchBundle\Entity\Questions $question
     * @return Users
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
