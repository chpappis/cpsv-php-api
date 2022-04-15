<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see https://schema.org/OpeningHoursSpecification
 */
#[ORM\Entity]
#[ApiResource(iri: 'https://schema.org/OpeningHoursSpecification')]
class OpeningHoursSpecification
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
