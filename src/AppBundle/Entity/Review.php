<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Ad
 *
 * @ORM\Table(name="Review", indexes={@ORM\Index(name="id_ad", columns={"id_ad"}), @ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Review
{
    /**
     * @var string
     *
     * @ORM\Column(name="review", type="text", length=65535, nullable=false)
     */
    private $review;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rdate", type="date", nullable=false)
     */
    private $rdate;


        /**
     * @var integer
     *
     * @ORM\Column(name="id_review", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReview;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating;
    function getRating() {
        return $this->rating;
    }

    function setRating($rating) {
        $this->rating = $rating;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ad", type="bigint")
     */
    private $idAd;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_teacher", type="bigint")
     */
    private $idTeacher;
    
    function getIdTeacher() {
        return $this->idTeacher;
    }

    function setIdTeacher($idTeacher) {
        $this->idTeacher = $idTeacher;
    }

        function getIdAd() {
        return $this->idAd;
    }

    function setIdAd($idAd) {
        $this->idAd = $idAd;
    }

        /**
     * @var \AppBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="review")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;
    function getUser() {
        return $this->user;
    }

    function setUser($user) {
        $this->user = $user;
    }

    
    /**
     * Set review
     *
     * @param string $review
     *
     * @return Review
     */
    public function setReview($review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return string
     */
    public function getReview()
    {
        return $this->review;
    }

       function getRdate() {
        return $this->rdate;
    }

    function setRdate($rdate) {
        $this->rdate = $rdate;
    }

    /**
     * Get idReview
     *
     * @return integer
     */
    public function getIdReview()
    {
        return $this->idReview;
    }


}

