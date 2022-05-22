<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. The Cost class represents any costs related to the execution of a Public Service that the Agent consuming it needs to pay.
 *
 * @see http://data.europa.eu/m8g/Cost
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/Cost',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Cost
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $identifier;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $value;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\ManyToOne(targetEntity: Concept::class)]
    private $currency;

    #[ORM\ManyToMany(targetEntity: PublicOrganisation::class)]
    private $isDefinedBy;

    #[ORM\ManyToOne(targetEntity: Channel::class)]
    private $ifAccessedThrough;

    public function __construct()
    {
        $this->isDefinedBy = new ArrayCollection();
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

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

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

    public function getCurrency(): ?Concept
    {
        return $this->currency;
    }

    public function setCurrency(?Concept $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return Collection<int, PublicOrganisation>
     */
    public function getIsDefinedBy(): Collection
    {
        return $this->isDefinedBy;
    }

    public function addIsDefinedBy(PublicOrganisation $isDefinedBy): self
    {
        if (!$this->isDefinedBy->contains($isDefinedBy)) {
            $this->isDefinedBy[] = $isDefinedBy;
        }

        return $this;
    }

    public function removeIsDefinedBy(PublicOrganisation $isDefinedBy): self
    {
        $this->isDefinedBy->removeElement($isDefinedBy);

        return $this;
    }

    public function getIfAccessedThrough(): ?Channel
    {
        return $this->ifAccessedThrough;
    }

    public function setIfAccessedThrough(?Channel $ifAccessedThrough): self
    {
        $this->ifAccessedThrough = $ifAccessedThrough;

        return $this;
    }
}
