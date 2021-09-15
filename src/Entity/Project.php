<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=department::class, inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $create_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title_char;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $seaotext_char;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_char;

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

    public function getDepartment(): ?department
    {
        return $this->department;
    }

    public function setDepartment(?department $department): self
    {
        $this->department = $department;

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

    public function getTitleChar(): ?string
    {
        return $this->title_char;
    }

    public function setTitleChar(string $title_char): self
    {
        $this->title_char = $title_char;

        return $this;
    }

    public function getSeaotextChar(): ?string
    {
        return $this->seaotext_char;
    }

    public function setSeaotextChar(?string $seaotext_char): self
    {
        $this->seaotext_char = $seaotext_char;

        return $this;
    }

    public function getDescriptionText(): ?string
    {
        return $this->description_text;
    }

    public function setDescriptionText(string $description_text): self
    {
        $this->description_text = $description_text;

        return $this;
    }

    public function getImageChar(): ?string
    {
        return $this->image_char;
    }

    public function setImageChar(string $image_char): self
    {
        $this->image_char = $image_char;

        return $this;
    }
}
