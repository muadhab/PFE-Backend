<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_dept;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Service;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="departements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\ManyToMany(targetEntity=Departement::class, inversedBy="attachedFile")
     */
    private $AttachedFile;

    /**
     * @ORM\ManyToMany(targetEntity=Departement::class, mappedBy="AttachedFile")
     */
    private $attachedFile;

    public function __construct()
    {
        $this->AttachedFile = new ArrayCollection();
        $this->attachedFile = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDept(): ?int
    {
        return $this->id_dept;
    }

    public function setIdDept(int $id_dept): self
    {
        $this->id_dept = $id_dept;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->Service;
    }

    public function setService(string $Service): self
    {
        $this->Service = $Service;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getAttachedFile(): Collection
    {
        return $this->AttachedFile;
    }

    public function addAttachedFile(self $attachedFile): self
    {
        if (!$this->AttachedFile->contains($attachedFile)) {
            $this->AttachedFile[] = $attachedFile;
        }

        return $this;
    }

    public function removeAttachedFile(self $attachedFile): self
    {
        $this->AttachedFile->removeElement($attachedFile);

        return $this;
    }
}
