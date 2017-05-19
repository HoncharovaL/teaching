<?php

namespace AppBundle\Entity;

/**
 * Subjects
 */
class Subjects
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var integer
     * 
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
}

