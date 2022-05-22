<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. The Channel class represents the medium through which an Agent provides, uses or interacts in another way with a Public Service. Typical examples include online services, phone, walk-in centres etc.
 *
 * @see http://data.europa.eu/m8g/Channel
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/Channel',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Channel
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $identifier;

    #[ORM\ManyToMany(targetEntity: Agent::class)]
    private $ownedBy;

    #[ORM\ManyToOne(targetEntity: Concept::class)]
    private $type;

    #[ORM\ManyToMany(targetEntity: Evidence::class)]
    private $hasInput;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $openingHours;

    #[ORM\ManyToOne(targetEntity: OpeningHoursSpecification::class)]
    private $availabilityRestriction;

    public function __construct()
    {
        $this->ownedBy = new ArrayCollection();
        $this->hasInput = new ArrayCollection();
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

    /**
     * @return Collection<int, Agent>
     */
    public function getOwnedBy(): Collection
    {
        return $this->ownedBy;
    }

    public function addOwnedBy(Agent $ownedBy): self
    {
        if (!$this->ownedBy->contains($ownedBy)) {
            $this->ownedBy[] = $ownedBy;
        }

        return $this;
    }

    public function removeOwnedBy(Agent $ownedBy): self
    {
        $this->ownedBy->removeElement($ownedBy);

        return $this;
    }

    public function getType(): ?Concept
    {
        return $this->type;
    }

    public function setType(?Concept $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Evidence>
     */
    public function getHasInput(): Collection
    {
        return $this->hasInput;
    }

    public function addHasInput(Evidence $hasInput): self
    {
        if (!$this->hasInput->contains($hasInput)) {
            $this->hasInput[] = $hasInput;
        }

        return $this;
    }

    public function removeHasInput(Evidence $hasInput): self
    {
        $this->hasInput->removeElement($hasInput);

        return $this;
    }

    public function getOpeningHours(): ?string
    {
        return $this->openingHours;
    }

    public function setOpeningHours(?string $openingHours): self
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    public function getAvailabilityRestriction(): ?OpeningHoursSpecification
    {
        return $this->availabilityRestriction;
    }

    public function setAvailabilityRestriction(?OpeningHoursSpecification $availabilityRestriction): self
    {
        $this->availabilityRestriction = $availabilityRestriction;

        return $this;
    }
}
