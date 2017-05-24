<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * AdQuery
 *
 * @ORM\Table(name="ad_query", indexes={@ORM\Index(name="id_ad", columns={"id_ad"}), @ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_teacher", columns={"id_teacher"})})
 * @ORM\Entity
 */
class AdQuery
{
    /**
     * @var integer
     *
     * @ORM\Column(name="confirm", type="integer")
     */
    private $confirm;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_query", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuery;

    /**
     * @var \AppBundle\Entity\Ad
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ad")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_ad", referencedColumnName="id_ad")
     * })
     */
    private $ad;


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
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_teacher", referencedColumnName="id_user")
     * })
     */
    private $teacher;
    function getTeacher(): \AppBundle\Entity\Users {
        return $this->teacher;
    }

    function setTeacher(\AppBundle\Entity\Users $teacher) {
        $this->teacher = $teacher;
    }

    
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

       function getAd(): \AppBundle\Entity\Ad {
        return $this->ad;
    }

    function setAd(\AppBundle\Entity\Ad $ad) {
        $this->ad = $ad;
    }
       function getUser(): \AppBundle\Entity\Users {
        return $this->user;
    }

    function setUser(\AppBundle\Entity\Users $user) {
        $this->user = $user;
    }

   
}

