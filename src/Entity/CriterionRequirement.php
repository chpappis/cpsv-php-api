<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://data.europa.eu/m8g/CriterionRequirement
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/CriterionRequirement',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class CriterionRequirement
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    #[Groups("publicservicegroup")]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    //#[Groups("publicservicegroup")]
    private $identifier;

    #[ORM\Column(type: 'string', length: 255)]
    //#[Groups("publicservicegroup")]
    private $name;

    #[ORM\ManyToMany(targetEntity: Concept::class)]
    //#[Groups("publicservicegroup")]
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
