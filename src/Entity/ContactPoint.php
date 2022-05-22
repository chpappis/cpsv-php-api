<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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

    public function getId(): ?int
    {
        return $this->id;
    }
}
