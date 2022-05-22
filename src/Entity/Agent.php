<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://purl.org/dc/terms/Agent
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://purl.org/dc/terms/Agent',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Agent
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $identifier;

    #[ORM\ManyToMany(targetEntity: Participation::class)]
    private $playsRole;

    #[ORM\ManyToOne(targetEntity: Address::class)]
    private $hasAddress;

    public function __construct()
    {
        $this->playsRole = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, Participation>
     */
    public function getPlaysRole(): Collection
    {
        return $this->playsRole;
    }

    public function addPlaysRole(Participation $playsRole): self
    {
        if (!$this->playsRole->contains($playsRole)) {
            $this->playsRole[] = $playsRole;
        }

        return $this;
    }

    public function removePlaysRole(Participation $playsRole): self
    {
        $this->playsRole->removeElement($playsRole);

        return $this;
    }

    public function getHasAddress(): ?Address
    {
        return $this->hasAddress;
    }

    public function setHasAddress(?Address $hasAddress): self
    {
        $this->hasAddress = $hasAddress;

        return $this;
    }
}
