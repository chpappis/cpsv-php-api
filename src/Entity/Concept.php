<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://www.w3.org/2004/02/skos/core#Concept
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://www.w3.org/2004/02/skos/core#Concept',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Concept
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    #[Groups("publicservicegroup")]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    //#[Groups("publicservicegroup")]
    private $label;

    #[ORM\Column(type: 'string', length: 1024, nullable: true)]
    //#[Groups("publicservicegroup")]
    private $definition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDefinition(): ?string
    {
        return $this->definition;
    }

    public function setDefinition(?string $definition): self
    {
        $this->definition = $definition;

        return $this;
    }
}
