<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Subjects
 *
 * @ORM\Table(name="Subjects", indexes={@ORM\Index(name="id_stype", columns={"id_stype"})})
 * @ORM\Entity
 */
class Subjects
{
    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=100, nullable=false)
     */
    private $subject;

    /**
     * @var integer
     * 
     * @ORM\Column(name="id_subject", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSubject;
    
    /**
     * @var \AppBundle\Entity\SubjectType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SubjectType", inversedBy="subjects")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_stype", referencedColumnName="id_stype")
     * })
     */
    private $idStype;


        /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Subjects
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Get idSubject
     *
     * @return integer
     */
    public function getIdSubject()
    {
        return $this->idSubject;
    }

    /**
     * Set idStype
     *
     * @param \AppBundle\Entity\SubjectType $idStype
     *
     * @return Subjects
     */
    public function setIdStype(\AppBundle\Entity\SubjectType $idStype = null)
    {
        $this->idStype = $idStype;

        return $this;
    }

    /**
     * Get idStype
     *
     * @return \AppBundle\Entity\SubjectType
     */
    public function getIdStype()
    {
        return $this->idStype;
    }
    
       public function __toString() {
       return $this->getSubject();
    }
}

