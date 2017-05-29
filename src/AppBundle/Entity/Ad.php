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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AdServices", inversedBy="ad")
     * @ORM\JoinColumn(name="id_services", referencedColumnName="id_services")
     */

    private $services;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_services", type="bigint")
     */
    private $id_services;
    function getId_services() {
        return $this->id_services;
    }

    function setId_services($id_services) {
        $this->id_services = $id_services;
    }

        /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=100, nullable=true)
     */
    private $region;
        /**
     * @var string
     *
     * @ORM\Column(name="town", type="string", length=50, nullable=true)
     */
    private $town;
  
    /**
     * @var string
     *
     * @ORM\Column(name="area", type="string", length=50, nullable=true)
     */
    private $area;
    
     /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=50, nullable=true)
     */
    private $place;
   
    /**
     * @var boolean
     *
     * @ORM\Column(name="online", type="integer", nullable=true)
     */
     private $online;
     
             /**
     * @var integer
     *
     * @ORM\Column(name="stste", type="integer")
     */
    private $state;
    
                 /**
     * @var integer
     *
     * @ORM\Column(name="ispay", type="integer")
     */
    private $ispay;
    function getIspay() {
        return $this->ispay;
    }

    function setIspay($ispay) {
        $this->ispay = $ispay;
    }

        function getState() {
        return $this->state;
    }

    function setState($state) {
        $this->state = $state;
    }

        function getOnline() {
        return $this->online;
    }

    function setOnline($online) {
        $this->online = $online;
    }

        function getRegion() {
        return $this->region;
    }

    function getTown() {
        return $this->town;
    }

    function getArea() {
        return $this->area;
    }

    function getPlace() {
        return $this->place;
    }

    function setRegion($region) {
        $this->region = $region;
    }

    function setTown($town) {
        $this->town = $town;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setPlace($place) {
        $this->place = $place;
    }

        function getServices(){
        return $this->services;
    }

    function setServices($services) {
        $this->services = $services;
    }

        /**
     * @var \AppBundle\Entity\Subjects
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Subjects", inversedBy="ad")
     * @ORM\JoinColumn(name="id_subject", referencedColumnName="id_subject")
     */
    private $subject;


    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="ad")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
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

    function getSubject() {
        return $this->subject;
    }

    function setSubject($subject) {
        $this->subject = $subject;
    }
        function getUser() {
        return $this->user;
    }

    function setUser($user) {
        $this->user = $user;
    }
    
    /**
     * @return string
     */
    public function __toString() {
        return sprintf('%s (%s)',
                $this->getSubject() ? $this->getSubject()->getSubject() : '',
                $this->adate->format('d.m.Y'));
    }
}

