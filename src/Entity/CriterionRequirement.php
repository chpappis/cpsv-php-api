<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://data.europa.eu/m8g/CriterionRequirement
 */
#[ORM\Entity]
#[ApiResource(iri: 'http://data.europa.eu/m8g/CriterionRequirement')]
class CriterionRequirement
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
