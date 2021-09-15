<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartnerRepository::class)
 */
class Partner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="partners")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=type::class, inversedBy="partners")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $create_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_char;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_char;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city_char;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_char;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?type
    {
        return $this->type;
    }

    public function setType(?type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCreateDate(): ?string
    {
        return $this->create_date;
    }

    public function setCreateDate(string $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getNameChar(): ?string
    {
        return $this->name_char;
    }

    public function setNameChar(string $name_char): self
    {
        $this->name_char = $name_char;

        return $this;
    }

    public function getAddressChar(): ?string
    {
        return $this->address_char;
    }

    public function setAddressChar(string $address_char): self
    {
        $this->address_char = $address_char;

        return $this;
    }

    public function getCityChar(): ?string
    {
        return $this->city_char;
    }

    public function setCityChar(string $city_char): self
    {
        $this->city_char = $city_char;

        return $this;
    }

    public function getEmailChar(): ?string
    {
        return $this->email_char;
    }

    public function setEmailChar(string $email_char): self
    {
        $this->email_char = $email_char;

        return $this;
    }
}
