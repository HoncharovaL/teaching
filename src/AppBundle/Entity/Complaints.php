<?php

namespace AppBundle\Entity;

/**
 * Complaints
 */
class Complaints
{
    /**
     * @var integer
     */
    private $idAd;

    /**
     * @var integer
     */
    private $idMes;

    /**
     * @var string
     */
    private $act;

    /**
     * @var \DateTime
     */
    private $dateAct;

    /**
     * @var \DateTime
     */
    private $dateEnd;

    /**
     * @var \DateTime
     */
    private $dateComplaints;

    /**
     * @var integer
     */
    private $idComplaints;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $idSender;


    /**
     * Set idAd
     *
     * @param integer $idAd
     *
     * @return Complaints
     */
    public function setIdAd($idAd)
    {
        $this->idAd = $idAd;

        return $this;
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
     * Set idMes
     *
     * @param integer $idMes
     *
     * @return уomplaints
     */
    public function setIdMes($idMes)
    {
        $this->idMes = $idMes;

        return $this;
    }

    /**
     * Get idMes
     *
     * @return integer
     */
    public function getIdMes()
    {
        return $this->idMes;
    }

    /**
     * Set act
     *
     * @param string $act
     *
     * @return уomplaints
     */
    public function setAct($act)
    {
        $this->act = $act;

        return $this;
    }

    /**
     * Get act
     *
     * @return string
     */
    public function getAct()
    {
        return $this->act;
    }

    /**
     * Set dateAct
     *
     * @param \DateTime $dateAct
     *
     * @return уomplaints
     */
    public function setDateAct($dateAct)
    {
        $this->dateAct = $dateAct;

        return $this;
    }

    /**
     * Get dateAct
     *
     * @return \DateTime
     */
    public function getDateAct()
    {
        return $this->dateAct;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return уomplaints
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set dateComplaints
     *
     * @param \DateTime $dateComplaints
     *
     * @return уomplaints
     */
    public function setDateComplaints($dateComplaints)
    {
        $this->dateComplaints = $dateComplaints;

        return $this;
    }

    /**
     * Get dateComplaints
     *
     * @return \DateTime
     */
    public function getDateComplaints()
    {
        return $this->dateComplaints;
    }

    /**
     * Get idComplaints
     *
     * @return integer
     */
    public function getIdComplaints()
    {
        return $this->idComplaints;
    }

    /**
     * Set idSender
     *
     * @param \AppBundle\Entity\Users $idSender
     *
     * @return уomplaints
     */
    public function setIdSender(\AppBundle\Entity\Users $idSender = null)
    {
        $this->idSender = $idSender;

        return $this;
    }

    /**
     * Get idSender
     *
     * @return \AppBundle\Entity\Users
     */
    public function getIdSender()
    {
        return $this->idSender;
    }
}

