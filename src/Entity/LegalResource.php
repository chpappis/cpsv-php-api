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
}
