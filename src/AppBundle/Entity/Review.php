<?php

namespace AppBundle\Entity;

/**
 * Review
 */
class Review
{
    /**
     * @var string
     */
    private $review;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $idReview;

    /**
     * @var \AppBundle\Entity\Ad
     */
    private $idAd;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $idUser;


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

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Review
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
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

    /**
     * Set idAd
     *
     * @param \AppBundle\Entity\Ad $idAd
     *
     * @return Review
     */
    public function setIdAd(\AppBundle\Entity\Ad $idAd = null)
    {
        $this->idAd = $idAd;

        return $this;
    }

    /**
     * Get idAd
     *
     * @return \AppBundle\Entity\Ad
     */
    public function getIdAd()
    {
        return $this->idAd;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\Users $idUser
     *
     * @return Review
     */
    public function setIdUser(\AppBundle\Entity\Users $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\Users
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}

