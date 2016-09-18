<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Vocabulary
 *
 * @ORM\Table(name="vocabulary")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\VocabularyRepository")
 */
class Vocabulary
{
    // Constant to use it with the field status to create a new Vocabulary
    const STATUS_INACTIVATE =0;
    const STATUS_ACTIVATE =1;
    const STATATUS_DELETE =2;

    // Constant to use it with the field visibility to create a new Vocabulary with visibility in frontend
    const VISIBILITY_INVISIBLE =0;
    const VISIBILITY_VISIBLE =1;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @Assert\NotBlank(message = "El nombre de la Categoria no puede estar en blanco")
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "El nombre debe contener al menos {{ limit }} caracteres de largo",
     *      maxMessage = "El nombre debe contener un maximo de {{ limit }} caracteres de largo"
     * )
     * @Assert\Type("string", message = "El nombre debe ser escrito con caracteres")
     * @Assert\Regex(
     *     pattern     = "/^[a-z0-9ñáéíóú ]+$/i",
     *     message = "El nombre debe ser escrito con caracteres, espacios y numeros solamente"
     * )
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
     *
     * @Assert\Type(
     *     type="integer",
     *     message="El valor {{ value }} no es del tipo Entero"
     * )
     * @Assert\Range(
     *      min = 0,
     *      max = 2,
     *      minMessage = "Usted debe escoger un numero mayor o igual a {{ limit }}",
     *      maxMessage = "Usted debe escoger un numero menor o igual a {{ limit }}"
     * )
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="visibility", type="integer", nullable=false)
     *
     * @Assert\Type(
     *     type="integer",
     *     message="El valor {{ value }} no es del tipo Entero"
     * )
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "Usted debe escoger un numero mayor o igual a {{ limit }}",
     *      maxMessage = "Usted debe escoger un numero menor o igual a {{ limit }}"
     * )
     */
    private $visibility;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=true)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "La descripcion debe contener al menos {{ limit }} caracteres de largo",
     *      maxMessage = "La descripcion debe contener un maximo de {{ limit }} caracteres de largo"
     * )
     * @Assert\Type("string", message = "La descripcion debe ser escrito con caracteres")
     * @Assert\Regex(
     *     pattern     = "/^[a-z0-9ñáéíóú ]+$/i",
     *     message = "La descripcion debe ser escrito con caracteres, espacios y numeros solamente"
     * )
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
     * Constructor
     */
    public function __construct()
    {
        //By Default, An Vocabulary should be created like an active and visible vocabulary
        $this->status = self::STATUS_ACTIVATE;
        $this->visibility = self::VISIBILITY_VISIBLE;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Vocabulary
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
     * @return Vocabulary
     */
    public function setMachineName($machineName)
    {
        $restricted = array('á', 'Á', 'é', 'É', 'í', 'Í', 'ó', 'Ó', 'ú', 'Ú', 'ñ', 'Ñ');
        $allowed = array('a', 'a', 'e', 'e', 'i', 'i', 'o', 'o', 'u', 'u', 'n', 'n');

        // Convert to available characters
        $machineName = str_replace($restricted, $allowed, $machineName);

        // Leaving only the letters and numbers
        $machineName = preg_replace('/[^a-zA-Z0-9]+/', '', $machineName);

        // Convert text to lowercase
        $machineName = strtolower($machineName);

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
     * @return Vocabulary
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
     * Set visibility
     *
     * @param integer $visibility
     *
     * @return Vocabulary
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get visibility
     *
     * @return integer
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Vocabulary
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
     * Get textStatus
     *
     * @return string
     */
    public function getTextStatus($status)
    {
        if($status==0)
        {
            return "Inactivo";
        }
        elseif($status==1)
        {
            return "Activo";
        }
        elseif($status==2)
        {
            return "Borrado";
        }
    }

    /**
     * Get textVisibility
     *
     * @return string
     */
    public function getTextVisibility($visibility)
    {
        if($visibility==0)
        {
            return "No Visible";
        }
        elseif($visibility==1)
        {
            return "Visible";
        }
    }
}
