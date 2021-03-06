<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://www.w3.org/2004/02/skos/core#Collection
 */
#[ORM\Entity]
#[ApiResource(
    shortName: 'Collection', 
    iri: 'http://www.w3.org/2004/02/skos/core#Collection',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Collection
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
