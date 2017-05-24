<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * SubjectType
 *
 * @ORM\Table(name="subject_type")
 * @ORM\Entity
 */
class SubjectType
{
    /**
     * @var string
     *
     * @ORM\Column(name="stype", type="string", length=100, nullable=false)
     */
    private $stype;
    /**
     * @var integer
     *
     * @ORM\Column(name="id_stype", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStype;

    /**
     * @var \AppBundle\Entity\SubjectType
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Subjects", mappedBy="idStype", cascade={"ALL"}, orphanRemoval=true)
     */
    private $subjects = [];
    /**
     * Set stype
     *
     * @param string $stype
     *
     * @return SubjectType
     */
    public function setStype($stype)
    {
        $this->stype = $stype;

        return $this;
    }

    /**
     * Get stype
     *
     * @return string
     */
    public function getStype()
    {
        return $this->stype;
    }

    /**
     * Get idStype
     *
     * @return integer
     */
    public function getIdStype()
    {
        return $this->idStype;
    }
    
    public function setSubjects($subjects) {
        foreach($subjects as $subject) {
            $subject->setIdStype($this);
            
        }
        
        $this->subjects = $subjects;
    }
        function getSubjects() {
        return $this->subjects;
    }
    
    /**
     * Add subject
     *
     * @param \AppBundle\Entity\Subjects $subject
     *
     * @return SubjectType
     */
    public function addSubject(\AppBundle\Entity\Subjects $subject)
    {
        $subject->setIdStype($this);
        $this->subjects->add($subject);

        return $this;
    }

    /**
     * Remove subject
     *
     * @param \AppBundle\Entity\Subjects $subject
     */
    public function removeSubject(\AppBundle\Entity\Subjects $subject)
    {
        $this->subjects->removeElement($subject);
    }
     public function __construct() {
        $this->subjects = new ArrayCollection();
    }
    
 
    public function __toString() {
        return $this->stype;
    }

}

