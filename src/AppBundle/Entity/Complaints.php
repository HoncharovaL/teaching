<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Complaints
 *
 * @ORM\Table(name="Complaints", indexes={@ORM\Index(name="id_ad", columns={"id_ad"}), @ORM\Index(name="id_mes", columns={"id_mes"}), @ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Complaints
{
    /**
     * @var \AppBundle\Entity\Ad
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ad", inversedBy="complaints")
     * @ORM\JoinColumn(name="id_ad", referencedColumnName="id_ad")
     */
    private $ad;
    /**
     * @var \AppBundle\Entity\Messages
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Messages", inversedBy="complaints")
     * @ORM\JoinColumn(name="id_mes", referencedColumnName="id_mes")
     */
    private $mes;

        /**
     * @var string
     *
     * @ORM\Column(name="act", type="string", length=100, nullable=false)
     */
    private $act;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_act", type="date", nullable=false)
     */
    private $dateAct;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date", nullable=false)
     */
    private $dateEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_complaints", type="date", nullable=false)
     */
    private $dateComplaints;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_complaints", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComplaints;

    /**
     * @var \AppBundle\Entity\Users
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users", inversedBy="review")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     */
    private $user;

    /**
     * Set act
     *
     * @param string $act
     *
     * @return Complaints
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
     * @return Complaints
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
     * @return Complaints
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
     * @return Complaints
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

   
    
        function getAd(): \AppBundle\Entity\Ad {
        return $this->ad;
    }

    function getMes(): \AppBundle\Entity\Messages {
        return $this->mes;
    }

    function getUser(): \AppBundle\Entity\Users {
        return $this->user;
    }

    function setAd(\AppBundle\Entity\Ad $ad) {
        $this->ad = $ad;
    }

    function setMes(\AppBundle\Entity\Messages $mes) {
        $this->mes = $mes;
    }

    function setUser(\AppBundle\Entity\Users $user) {
        $this->user = $user;
    }

}

