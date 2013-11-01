<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Enquiry
 *
 * @ORM\Table(name="enquiry")
 * @ORM\Entity
 */
class Enquiry
{
    /**
     * @var integer
     *
     * @ORM\Column(name="enquiry_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $enquiryId;

    /**
     * @var string
     * @Assert\NotBlank(message ="Campo vacio")
     *
     * @ORM\Column(name="nombre", type="string", length=30, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     * @Assert\Email(
     *     message = "el Email '{{ value }}' que esta ingresando no es valido  .",
     *     checkMX = true
     * )
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Assert\Length(
     *      max = "30",
     *      maxMessage = "El tema no debe sobrepasar los {{ limit }} caracteres de tamaño"
     * )
     * @Assert\NotBlank(message ="Campo vacio")
     * @ORM\Column(name="subject", type="string", length=30, nullable=false)
     */
    private $subject;

    /**
     * @var string
     * @Assert\Length(
     *      min = "10",
     *      minMessage = "El texto debe tener por lo menos  {{ limit }} caracteres "
     * )
     * @ORM\Column(name="body", type="text", nullable=false)
     */
    private $body;



    /**
     * Get enquiryId
     *
     * @return integer 
     */
    public function getEnquiryId()
    {
        return $this->enquiryId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Enquiry
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Enquiry
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Enquiry
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
     * Set body
     *
     * @param string $body
     * @return Enquiry
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /*public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('nombre', new NotBlank());

        $metadata->addPropertyConstraint('subject', new NotBlank());
        
    }*/
}