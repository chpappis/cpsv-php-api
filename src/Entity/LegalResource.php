<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://data.europa.eu/eli/ontology#LegalResource
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/eli/ontology#LegalResource',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class LegalResource
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: self::class)]
    private $Related;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $identifier;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    public function __construct()
    {
        $this->Related = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, self>
     */
    public function getRelated(): Collection
    {
        return $this->Related;
    }

    public function addRelated(self $related): self
    {
        if (!$this->Related->contains($related)) {
            $this->Related[] = $related;
        }

        return $this;
    }

    public function removeRelated(self $related): self
    {
        $this->Related->removeElement($related);

        return $this;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
