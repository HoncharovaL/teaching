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
     * @var string
     *
     * @ORM\Column(name="queryText", type="string", length=100, nullable=true)
     */
    private $queryText;

    function getQueryText() {
        return $this->queryText;
    }

    function setQueryText($queryText) {
        $this->queryText = $queryText;
    }

        /**
     * @var integer
     *
     * @ORM\Column(name="id_query", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuery;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ad", type="bigint")
     */
    private $idAd;

    function getIdAd() {
        return $this->idAd;
    }

    function setIdAd($idAd) {
        $this->idAd = $idAd;
    }

    /**
     * @var \AppBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="adQuery")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @var \AppBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="adQuery")
     * @ORM\JoinColumn(name="id_teacher", referencedColumnName="id")
     */
    private $teacher;
    
    function getTeacher() {
        return $this->teacher;
    }

    function setTeacher($teacher) {
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

       function getUser() {
        return $this->user;
    }

    function setUser($user) {
        $this->user = $user;
    }
    public function __construct()
    {
        $this->queryText="Подтвердите, пожалуйста, что я являюсь Вашим учеником";
        $this->confirm=0;
    }
   
}

