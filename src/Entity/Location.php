<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://purl.org/dc/terms/Location
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://purl.org/dc/terms/Location',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: PublicOrganisation::class, inversedBy: 'spatial')]
    private $publicOrganisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicOrganisation(): ?PublicOrganisation
    {
        return $this->publicOrganisation;
    }

    public function setPublicOrganisation(?PublicOrganisation $publicOrganisation): self
    {
        $this->publicOrganisation = $publicOrganisation;

        return $this;
    }
}
