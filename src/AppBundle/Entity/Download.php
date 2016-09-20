<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Photo
 *
 * @ORM\Table(name="download")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DownloadRepository")
 */
class Download
{

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255, nullable=false)
     */

    private $format;


    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Book
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Book")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     * })
     */
    private $book;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return Download
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return Download
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Download
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param Book $book
     * @return Download
     */
    public function setBook($book)
    {
        $this->book = $book;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Download
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}
