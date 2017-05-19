<?php

namespace AppBundle\Entity;

/**
 * AdServices
 */
class AdServices
{
    /**
     * @var string
     */
    private $services;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
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

