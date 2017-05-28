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
     * @var \AppBundle\Entity\Ad
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ad", inversedBy="review")
     * @ORM\JoinColumn(name="id_ad", referencedColumnName="id_ad")
     */
    private $ad;


    /**
     * @var \AppBundle\Entity\Users
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users", inversedBy="review")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     */
    private $user;
    function getUser(): \AppBundle\Entity\Users {
        return $this->user;
    }

    function setUser(\AppBundle\Entity\Users $user) {
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

       function getRdate(): \DateTime {
        return $this->rdate;
    }

    function setRdate(\DateTime $rdate) {
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

       function getAd(): \AppBundle\Entity\Ad {
        return $this->ad;
    }

    function setAd(\AppBundle\Entity\Ad $ad) {
        $this->ad = $ad;
    }

}

