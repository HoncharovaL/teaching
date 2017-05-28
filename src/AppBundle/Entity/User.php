<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->ad = new ArrayCollection();
        $this->updatedAt = new \DateTime();
        $this->rating=0;
    }
    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="photo_image", fileNameProperty="photo")
     * 
     * @var File
     */
   private $photoFile;

   
     /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Users
     */
    public function setPhotoFile(File $image = null)
    {
        $this->photoFile = $image;
        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    
        return $this;
    }

    /**
     * @return File|null
     */
    public function getPhotoFile()
    {
        return $this->photoFile;
    }

/**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;
    
    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="patronymic", type="string", length=100, nullable=true)
     */
    private $patronymic;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=100, nullable=true)
     */
    private $surname;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="regdate", type="date", nullable=true)
     */
    private $regdate;

        /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=300, nullable=true)
     */
    private $photo;

    /**
     * @var string
     * 
     * @ORM\Column(name="phone", type="string", length=100, nullable=true)
     */
    private $phone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=300, nullable=true)
     */
    private $education;
    
    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string", length=300, nullable=true)
     */
    private $experience;
    
        /**
     * @var string
     *
     * @ORM\Column(name="university", type="string", length=500, nullable=true)
     */
    private $university;
    function getUniversity() {
        return $this->university;
    }

    function setUniversity($university) {
        $this->university = $university;
    }

        function getEducation() {
        return $this->education;
    }

    function getExperience() {
        return $this->experience;
    }

    function setEducation($education) {
        $this->education = $education;
    }

    function setExperience($experience) {
        $this->experience = $experience;
    }

            /**
     * @var string
     * 
     * @ORM\Column(name="role", type="string", length=100, nullable=true)
     */
    private $role;
    /**
     * @var \AppBundle\Entity\User
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ad", mappedBy="user", cascade={"ALL"}, orphanRemoval=true)
     */
    private $ad= [];
    
    function getId() {
        return $this->id;
    }

    function getRole() {
        return $this->role;
    }

    function setRole($role) {
        $this->role = $role;
    }

     /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $about;
    
        /**
     * Set name
     *
     * @param string $name
     *
     * @return Users
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
     * Set patronymic
     *
     * @param string $patronymic
     *
     * @return Users
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * Get patronymic
     *
     * @return string
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Users
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Users
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
     * Set regdate
     *
     * @param \DateTime $regdate
     *
     * @return Users
     */
    public function setRegdate($regdate)
    {
        $this->regdate = $regdate;

        return $this;
    }

    /**
     * Get regdate
     *
     * @return \DateTime
     */
    public function getRegdate()
    {
        return $this->regdate;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Users
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Users
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set about
     *
     * @param string $about
     *
     * @return Users
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }
    
    public function setAd($ad) {
        foreach($ad as $a) {
            $a->setIdUser($this);
            
        }
        
        $this->ad = $ad;
    }
        function getAd() {
        return $this->ad;
    }
    
    /**
     * Add ad
     *
     * @param \AppBundle\Entity\Ad $ad
     *
     * @return Ad
     */
    public function addAd(\AppBundle\Entity\Ad $ad)
    {
        $ad->setIdStype($this);
        $this->ad->add($ad);

        return $this;
    }

    /**
     * Remove ad
     *
     * @param \AppBundle\Entity\Ad $ad
     */
    public function removeAd(\AppBundle\Entity\Ad $ad)
    {
        $this->ad->removeElement($ad);
    }

    public function __toString() {
       return sprintf('%s  %s  %s',
                $this->getName() ? $this->getName()  : '',
                $this->getPatronymic() ? $this->getPatronymic() : '',
                $this->getSurname() ? $this->getSurname() : '');
    }

}
