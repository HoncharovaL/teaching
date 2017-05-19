<?php

namespace AppBundle\Entity;

/**
 * Messages
 */
class Messages
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $dateMes;

    /**
     * @var integer
     */
    private $idMes;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $idSender;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $idRecipient;


    /**
     * Set message
     *
     * @param string $message
     *
     * @return Messages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set dateMes
     *
     * @param \DateTime $dateMes
     *
     * @return Messages
     */
    public function setDateMes($dateMes)
    {
        $this->dateMes = $dateMes;

        return $this;
    }

    /**
     * Get dateMes
     *
     * @return \DateTime
     */
    public function getDateMes()
    {
        return $this->dateMes;
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
     * Set idSender
     *
     * @param \AppBundle\Entity\Users $idSender
     *
     * @return Messages
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

    /**
     * Set idRecipient
     *
     * @param \AppBundle\Entity\Users $idRecipient
     *
     * @return Messages
     */
    public function setIdRecipient(\AppBundle\Entity\Users $idRecipient = null)
    {
        $this->idRecipient = $idRecipient;

        return $this;
    }

    /**
     * Get idRecipient
     *
     * @return \AppBundle\Entity\Users
     */
    public function getIdRecipient()
    {
        return $this->idRecipient;
    }
}

