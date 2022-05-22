<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. Outputs can be any resource - document, artefact – anything produced by the Public Service. In the context of a Public Service, the output provides an official document or other artefact of the Competent Authority (Public Organisation) that permits/authorises/entitles an Agent to (do) something.
 *
 * @see http://data.europa.eu/m8g/Output
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/Output',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Output
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $identifier;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\ManyToMany(targetEntity: Concept::class)]
    private $type;

    public function __construct()
    {
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Concept>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Concept $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
        }

        return $this;
    }

    public function removeType(Concept $type): self
    {
        $this->type->removeElement($type);

        return $this;
    }
}
