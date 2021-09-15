<?php

namespace App\Entity;

use App\Repository\ContentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentRepository::class)
 */
class Content
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="contents")
     */
    private $user;

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
    private $seotext_char;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $context_text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_char;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="content_id")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Calender::class, mappedBy="content")
     */
    private $calenders;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->calenders = new ArrayCollection();
    }

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

    public function getSeotextChar(): ?string
    {
        return $this->seotext_char;
    }

    public function setSeotextChar(?string $seotext_char): self
    {
        $this->seotext_char = $seotext_char;

        return $this;
    }

    public function getContextText(): ?string
    {
        return $this->context_text;
    }

    public function setContextText(string $context_text): self
    {
        $this->context_text = $context_text;

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

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setContentId($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getContentId() === $this) {
                $category->setContentId(null);
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
            $calender->setContent($this);
        }

        return $this;
    }

    public function removeCalender(Calender $calender): self
    {
        if ($this->calenders->removeElement($calender)) {
            // set the owning side to null (unless already changed)
            if ($calender->getContent() === $this) {
                $calender->setContent(null);
            }
        }

        return $this;
    }
}
