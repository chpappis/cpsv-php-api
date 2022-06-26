<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
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
    #[Groups("publicservicegroup")]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("publicservicegroup")]
    private $code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("publicservicegroup")]
    private $identifier;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("publicservicegroup")]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("publicservicegroup")]
    private $description;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

   
}
