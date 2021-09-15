<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    /**
     * @ORM\OneToMany(targetEntity=Content::class, mappedBy="user")
     */
    private $contents;

    /**
     * @ORM\OneToMany(targetEntity=Calender::class, mappedBy="user")
     */
    private $calenders;

    /**
     * @ORM\OneToMany(targetEntity=Partner::class, mappedBy="user")
     */
    private $partners;

    /**
     * @ORM\OneToMany(targetEntity=Project::class, mappedBy="user")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity=Department::class, mappedBy="user")
     */
    private $departments;

    public function __construct()
    {
        $this->contents = new ArrayCollection();
        $this->calenders = new ArrayCollection();
        $this->partners = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->departments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection|Content[]
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    public function addContent(Content $content): self
    {
        if (!$this->contents->contains($content)) {
            $this->contents[] = $content;
            $content->setUser($this);
        }

        return $this;
    }

    public function removeContent(Content $content): self
    {
        if ($this->contents->removeElement($content)) {
            // set the owning side to null (unless already changed)
            if ($content->getUser() === $this) {
                $content->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Calender[]
     */
    public function getCalenders(): Collection
    {
        return $this->calenders;
    }

    public function addCalender(Calender $calender): self
    {
        if (!$this->calenders->contains($calender)) {
            $this->calenders[] = $calender;
            $calender->setUser($this);
        }

        return $this;
    }

    public function removeCalender(Calender $calender): self
    {
        if ($this->calenders->removeElement($calender)) {
            // set the owning side to null (unless already changed)
            if ($calender->getUser() === $this) {
                $calender->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Partner[]
     */
    public function getPartners(): Collection
    {
        return $this->partners;
    }

    public function addPartner(Partner $partner): self
    {
        if (!$this->partners->contains($partner)) {
            $this->partners[] = $partner;
            $partner->setUser($this);
        }

        return $this;
    }

    public function removePartner(Partner $partner): self
    {
        if ($this->partners->removeElement($partner)) {
            // set the owning side to null (unless already changed)
            if ($partner->getUser() === $this) {
                $partner->setUser(null);
            }
        }

        return $this;
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
            $project->setUser($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getUser() === $this) {
                $project->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Department[]
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function addDepartment(Department $department): self
    {
        if (!$this->departments->contains($department)) {
            $this->departments[] = $department;
            $department->setUser($this);
        }

        return $this;
    }

    public function removeDepartment(Department $department): self
    {
        if ($this->departments->removeElement($department)) {
            // set the owning side to null (unless already changed)
            if ($department->getUser() === $this) {
                $department->setUser(null);
            }
        }

        return $this;
    }
}
