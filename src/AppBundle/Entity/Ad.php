<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Ad
 *
 * @ORM\Table(name="Ad", indexes={@ORM\Index(name="id_services", columns={"id_services"}), @ORM\Index(name="id_subject", columns={"id_subject"}), @ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Ad
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adate", type="date", nullable=false)
     */
    private $adate;

    /**
     * @var string
     *
     * @ORM\Column(name="ad_text", type="text", length=65535, nullable=false)
     */
    private $adText;

        /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=100, nullable=false)
     */
    private $currency;

        /**
     * @var integer
     *
     * @ORM\Column(name="durability", type="integer")
     */
    private $durability;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=100, nullable=false)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_serv", type="date", nullable=false)
     */
    private $dateServ;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ad", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAd;

    /**
     * @var \AppBundle\Entity\AdServices
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AdServices")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_services", referencedColumnName="id_services")
     * })
     */
    private $services;

    /**
     * @var \AppBundle\Entity\Subjects
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Subjects")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_subject", referencedColumnName="id_subject")
     * })
     */
    private $subject;


    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $user;



        /**
     * Set date
     *
     * @param \DateTime $adate
     *
     * @return Ad
     */
    public function setAdate($adate)
    {
        $this->adate = $adate;

        return $this;
    }

    /**
     * Get adate
     *
     * @return \DateTime
     */
    public function getAdate()
    {
        return $this->adate;
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

    function getServices(): \AppBundle\Entity\AdServices  {
        return $this->services;
    }

    function setServices(\AppBundle\Entity\AdServices $services= null) {
        $this->services = $services;
    }
        function getSubject(): \AppBundle\Entity\Subjects {
        return $this->subject;
    }

    function setSubject(\AppBundle\Entity\Subjects $subject) {
        $this->subject = $subject;
    }
        function getUser(): \AppBundle\Entity\Users {
        return $this->user;
    }

    function setUser(\AppBundle\Entity\Users $user) {
        $this->user = $user;
    }
}

