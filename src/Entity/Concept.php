<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
