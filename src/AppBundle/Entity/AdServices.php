<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * AdServices
 *
 * @ORM\Table(name="ad_services")
 * @ORM\Entity
 */
class AdServices
{
    /**
     * @var string
     *
     * @ORM\Column(name="services", type="string", length=100, nullable=false)
     */
    private $services;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=3000, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_services", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idServices;


    /**
     * Set services
     *
     * @param string $services
     *
     * @return AdServices
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return string
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return AdServices
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
     * Set description
     *
     * @param string $description
     *
     * @return AdServices
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
     * Get idServices
     *
     * @return integer
     */
    public function getIdServices()
    {
        return $this->idServices;
    }
}

