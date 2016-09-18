<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TermData
 *
 * @ORM\Table(name="term_data", indexes={@ORM\Index(name="fk_term_data_vocabulary1_idx", columns={"vocabulary_id"})})
 * @ORM\Entity
 */
class TermData
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="machine_name", type="string", length=100, nullable=false)
     */
    private $machineName;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Vocabulary
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vocabulary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vocabulary_id", referencedColumnName="id")
     * })
     */
    private $vocabulary;


    /**
     * Constructor
     */
    public function __construct()
    {

    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return TermData
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set machineName
     *
     * @param string $machineName
     *
     * @return TermData
     */
    public function setMachineName($machineName)
    {
        $this->machineName = $machineName;

        return $this;
    }

    /**
     * Get machineName
     *
     * @return string
     */
    public function getMachineName()
    {
        return $this->machineName;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return TermData
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TermData
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set vocabulary
     *
     * @param \AppBundle\Entity\Vocabulary $vocabulary
     *
     * @return TermData
     */
    public function setVocabulary(\AppBundle\Entity\Vocabulary $vocabulary = null)
    {
        $this->vocabulary = $vocabulary;

        return $this;
    }

    /**
     * Get vocabulary
     *
     * @return \AppBundle\Entity\Vocabulary
     */
    public function getVocabulary()
    {
        return $this->vocabulary;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return TermData
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}
