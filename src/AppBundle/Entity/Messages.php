<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Messages
 *
 * @ORM\Table(name="Messages", indexes={@ORM\Index(name="id_sender", columns={"id_sender"}), @ORM\Index(name="id_recipient", columns={"id_recipient"})})
 * @ORM\Entity
 */
class Messages
{
    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mes", type="date", nullable=false)
     */
    private $dateMes;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_mes", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMes;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_sender", referencedColumnName="id_user")
     * })
     */
    private $sender;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_recipient", referencedColumnName="id_user")
     * })
     */
    private $recipient;
    function getRecipient(): \AppBundle\Entity\Users {
        return $this->recipient;
    }

    function setRecipient(\AppBundle\Entity\Users $recipient) {
        $this->recipient = $recipient;
    }

    
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

       function getSender(): \AppBundle\Entity\Users {
        return $this->sender;
    }

    function setSender(\AppBundle\Entity\Users $sender) {
        $this->sender = $sender;
    }
}

