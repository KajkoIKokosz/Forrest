<?php

namespace ForrestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pictures
 *
 * @ORM\Table(name="pictures")
 * @ORM\Entity(repositoryClass="ForrestBundle\Repository\PicturesRepository")
 */
class Pictures
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="picture")
     * 
     */
    private $question;
    
    
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
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;

    /**
     * @var int
     *
     * @ORM\Column(name="quest_id", type="integer")
     */
    private $questId;

    /**
     * @var int
     *
     * @ORM\Column(name="resp_id", type="integer")
     */
    private $respId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


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
     * Set source
     *
     * @param string $source
     * @return Pictures
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set questId
     *
     * @param integer $questId
     * @return Pictures
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
     * Set respId
     *
     * @param integer $respId
     * @return Pictures
     */
    public function setRespId($respId)
    {
        $this->respId = $respId;

        return $this;
    }

    /**
     * Get respId
     *
     * @return integer 
     */
    public function getRespId()
    {
        return $this->respId;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Pictures
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set question
     *
     * @param \ForrestBundle\Entity\Questions $question
     * @return Pictures
     */
    public function setQuestion(\ForrestBundle\Entity\Questions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \ForrestBundle\Entity\Questions 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
