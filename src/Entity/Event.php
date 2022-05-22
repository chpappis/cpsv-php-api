<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. This class represents an event that can be of any type that triggers, makes use of, or in some way is related to, a Public Service. It is not expected to be used directly, rather, one or other of its subclasses should be used. The properties of the class are, of course, inherited by those subclasses.
 *
 * @see http://data.europa.eu/m8g/Event
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/Event',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Event
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

    #[ORM\ManyToMany(targetEntity: PublicService::class)]
    private $relatedService;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->relatedService = new ArrayCollection();
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

    /**
     * @return Collection<int, PublicService>
     */
    public function getRelatedService(): Collection
    {
        return $this->relatedService;
    }

    public function addRelatedService(PublicService $relatedService): self
    {
        if (!$this->relatedService->contains($relatedService)) {
            $this->relatedService[] = $relatedService;
        }

        return $this;
    }

    public function removeRelatedService(PublicService $relatedService): self
    {
        $this->relatedService->removeElement($relatedService);

        return $this;
    }
}
