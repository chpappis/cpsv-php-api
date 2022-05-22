<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://purl.org/dc/terms/LinguisticSystem
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://purl.org/dc/terms/LinguisticSystem',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class LinguisticSystem
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
