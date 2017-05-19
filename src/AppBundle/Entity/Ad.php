<?php

namespace AppBundle\Entity;

/**
 * Ad
 */
class Ad
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $adText;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var integer
     */
    private $durability;

    /**
     * @var string
     */
    private $value;

    /**
     * @var \DateTime
     */
    private $dateServ;

    /**
     * @var integer
     */
    private $idAd;

    /**
     * @var \AppBundle\Entity\AdServices
     */
    private $idServices;

    /**
     * @var \AppBundle\Entity\Subjects
     */
    private $idSubject;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $idUser;


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Ad
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
     * Set adText
     *
     * @param string $adText
     *
     * @return Ad
     */
    public function setAdText($adText)
    {
        $this->adText = $adText;

        return $this;
    }

    /**
     * Get adText
     *
     * @return string
     */
    public function getAdText()
    {
        return $this->adText;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Ad
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Ad
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set durability
     *
     * @param integer $durability
     *
     * @return Ad
     */
    public function setDurability($durability)
    {
        $this->durability = $durability;

        return $this;
    }

    /**
     * Get durability
     *
     * @return integer
     */
    public function getDurability()
    {
        return $this->durability;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Ad
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set dateServ
     *
     * @param \DateTime $dateServ
     *
     * @return Ad
     */
    public function setDateServ($dateServ)
    {
        $this->dateServ = $dateServ;

        return $this;
    }

    /**
     * Get dateServ
     *
     * @return \DateTime
     */
    public function getDateServ()
    {
        return $this->dateServ;
    }

    /**
     * Get idAd
     *
     * @return integer
     */
    public function getIdAd()
    {
        return $this->idAd;
    }

    /**
     * Set idServices
     *
     * @param \AppBundle\Entity\AdServices $idServices
     *
     * @return Ad
     */
    public function setIdServices(\AppBundle\Entity\AdServices $idServices = null)
    {
        $this->idServices = $idServices;

        return $this;
    }

    /**
     * Get idServices
     *
     * @return \AppBundle\Entity\AdServices
     */
    public function getIdServices()
    {
        return $this->idServices;
    }

    /**
     * Set idSubject
     *
     * @param \AppBundle\Entity\Subjects $idSubject
     *
     * @return Ad
     */
    public function setIdSubject(\AppBundle\Entity\Subjects $idSubject = null)
    {
        $this->idSubject = $idSubject;

        return $this;
    }

    /**
     * Get idSubject
     *
     * @return \AppBundle\Entity\Subjects
     */
    public function getIdSubject()
    {
        return $this->idSubject;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\Users $idUser
     *
     * @return Ad
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

