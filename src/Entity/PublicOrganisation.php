<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://data.europa.eu/m8g/PublicOrganisation
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/PublicOrganisation',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class PublicOrganisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    #[Groups("publicservicegroup")]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    //#[Groups("publicservicegroup")]
    private $preferredLabel;

    #[ORM\ManyToMany(targetEntity: Location::class)]
    //#[Groups("publicservicegroup")]
    private $spatial;

    public function __construct()
    {
        $this->spatial = new ArrayCollection();
    }

   
    public function getId(): ?int
    {
        return $this->id;
    }

    // setId needed because of custom data provider PublicOrganisationCollectionDataProvider.php
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getPreferredLabel(): ?string
    {
        return $this->preferredLabel;
    }

    public function setPreferredLabel(string $preferredLabel): self
    {
        $this->preferredLabel = $preferredLabel;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getSpatial(): Collection
    {
        return $this->spatial;
    }

    public function addSpatial(Location $spatial): self
    {
        if (!$this->spatial->contains($spatial)) {
            $this->spatial[] = $spatial;
        }

        return $this;
    }

    public function removeSpatial(Location $spatial): self
    {
        $this->spatial->removeElement($spatial);

        return $this;
    }

    
}
