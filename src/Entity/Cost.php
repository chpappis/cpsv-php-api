<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. The Cost class represents any costs related to the execution of a Public Service that the Agent consuming it needs to pay.
 *
 * @see http://data.europa.eu/m8g/Cost
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/Cost',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Cost
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
