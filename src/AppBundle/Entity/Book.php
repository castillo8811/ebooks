<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BookRepository")
 */
class Book
{

    //Constant to use it with the field status to create a new User
    const STATUS_INACTIVATE = 0;


    const STATUS_ACTIVATE = 1;
    const STATATUS_DELETE = 2;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     *
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=50, nullable=false)
     *
     * @Assert\Url(
     *     message = "Url invalida '{{ value }}' no es una url valida.",
     * )
     */
    private $url;


    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", nullable=false)
     *
     */

    private $isbn;

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
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=255, nullable=false)
     *
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="sinopsis", type="text", nullable=false)
     *
     */
    private $sinopsis;

    /**
     * @var integer
     *
     * @ORM\Column(name="downloads", type="integer",nullable=true)
     */
    private $downloads;

    /**
     * @return int
     */
    public function getDownloads()
    {
        return $this->downloads;
    }

    /**
     * @param int $downloads
     */
    public function setDownloads($downloads)
    {
        $this->downloads = $downloads;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\TermData", mappedBy="book")
     */
    private $termData;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->test = new \Doctrine\Common\Collections\ArrayCollection();
        $this->termData = new \Doctrine\Common\Collections\ArrayCollection();

        //By Default, An User should be created like an active user
        $this->status = self::STATUS_ACTIVATE;
    }



    /**
     * Set status
     *
     * @param integer $status
     *
     * @return User
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Add termDatum
     *
     * @param \AppBundle\Entity\TermData $termDatum
     *
     * @return User
     */
    public function addTermDatum(\AppBundle\Entity\TermData $termDatum)
    {
        $this->termData[] = $termDatum;

        return $this;
    }

    /**
     * Remove termDatum
     *
     * @param \AppBundle\Entity\TermData $termDatum
     */
    public function removeTermDatum(\AppBundle\Entity\TermData $termDatum)
    {
        $this->termData->removeElement($termDatum);
    }

    /**
     * Get termData
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTermData()
    {
        return $this->termData;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     */
    public function getSalt()
    {
        // See "Do you need to use a Salt?" at http://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one

        return;
    }

    /**
     * Removes sensitive data from the user.
     */
    public function eraseCredentials()
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Book
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param int $isbn
     * @return Book
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param string $autor
     * @return Book
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
        return $this;
    }

    /**
     * @return string
     */
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    /**
     * @param string $sinopsis
     * @return Book
     */
    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;
        return $this;
    }
}