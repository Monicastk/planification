<?php

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FileRepository::class)]
class File
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'events_files')]
    private ?Events $file = null;

    /**
     * @var Collection<int, Events>
     */
    #[ORM\OneToMany(targetEntity: Events::class, mappedBy: 'file')]
    private Collection $id_file;

    public function __construct()
    {
        $this->id_file = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFile(): ?Events
    {
        return $this->file;
    }

    public function setFile(?Events $file): static
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return Collection<int, Events>
     */
    public function getIdFile(): Collection
    {
        return $this->id_file;
    }

    public function addIdFile(Events $idFile): static
    {
        if (!$this->id_file->contains($idFile)) {
            $this->id_file->add($idFile);
            $idFile->setFile($this);
        }

        return $this;
    }

    public function removeIdFile(Events $idFile): static
    {
        if ($this->id_file->removeElement($idFile)) {
            // set the owning side to null (unless already changed)
            if ($idFile->getFile() === $this) {
                $idFile->setFile(null);
            }
        }

        return $this;
    }
}
