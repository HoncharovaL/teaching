<?php

namespace AppBundle\Entity;

/**
 * AdQuery
 */
class AdQuery
{
    /**
     * @var integer
     */
    private $confirm;

    /**
     * @var integer
     */
    private $idQuery;

    /**
     * @var \AppBundle\Entity\Ad
     */
    private $idAd;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $idUser;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $idTeacher;


    /**
     * Set confirm
     *
     * @param integer $confirm
     *
     * @return AdQuery
     */
    public function setConfirm($confirm)
    {
        $this->confirm = $confirm;

        return $this;
    }

    /**
     * Get confirm
     *
     * @return integer
     */
    public function getConfirm()
    {
        return $this->confirm;
    }

    /**
     * Get idQuery
     *
     * @return integer
     */
    public function getIdQuery()
    {
        return $this->idQuery;
    }

    /**
     * Set idAd
     *
     * @param \AppBundle\Entity\Ad $idAd
     *
     * @return AdQuery
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
     * @return AdQuery
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

    /**
     * Set idTeacher
     *
     * @param \AppBundle\Entity\Users $idTeacher
     *
     * @return AdQuery
     */
    public function setIdTeacher(\AppBundle\Entity\Users $idTeacher = null)
    {
        $this->idTeacher = $idTeacher;

        return $this;
    }

    /**
     * Get idTeacher
     *
     * @return \AppBundle\Entity\Users
     */
    public function getIdTeacher()
    {
        return $this->idTeacher;
    }
}

