<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see https://schema.org/ContactPoint
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'https://schema.org/ContactPoint',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class ContactPoint
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: OpeningHoursSpecification::class)]
    private $availabilityRestriction;

    public function __construct()
    {
        $this->availabilityRestriction = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, OpeningHoursSpecification>
     */
    public function getAvailabilityRestriction(): Collection
    {
        return $this->availabilityRestriction;
    }

    public function addAvailabilityRestriction(OpeningHoursSpecification $availabilityRestriction): self
    {
        if (!$this->availabilityRestriction->contains($availabilityRestriction)) {
            $this->availabilityRestriction[] = $availabilityRestriction;
        }

        return $this;
    }

    public function removeAvailabilityRestriction(OpeningHoursSpecification $availabilityRestriction): self
    {
        $this->availabilityRestriction->removeElement($availabilityRestriction);

        return $this;
    }
}
