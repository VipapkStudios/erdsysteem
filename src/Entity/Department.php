<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="department")
     */
    private $projects;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="departments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
    private $description_text;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setDepartment($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getDepartment() === $this) {
                $project->setDepartment(null);
            }
        }

        return $this;
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

    public function getDescriptionText(): ?string
    {
        return $this->description_text;
    }

    public function setDescriptionText(string $description_text): self
    {
        $this->description_text = $description_text;

        return $this;
    }
}
