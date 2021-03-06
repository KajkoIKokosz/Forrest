<?php
namespace ForrestWatchBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
/**
 * Pictures
 * @Vich\Uploadable
 * @ORM\Table(name="pictures")
 * @ORM\Entity(repositoryClass="ForrestWatchBundle\Repository\PicturesRepository")
 */
class Pictures
{
    
//    public function __construct($id) {
//        $this->setId($id);
//        $this->setImageName("pict".time() + rand(1, 100000));
//        $this->setDescription("description");
//        $this->setSource("source");
//    }
    // V i c h
    
     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;
    
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        return $this;
    }
    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
    /**
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }
    
// R e l a c j e
    
    /**
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="picture")
     * 
     */
    private $question;
    
    // s k ł a d o w e
    
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    
    
//    public function setId($id)
//    {
//        $this->id = $id;
//    }
    
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
     * @param \ForrestWatchBundle\Entity\Questions $question
     * @return Pictures
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
}
