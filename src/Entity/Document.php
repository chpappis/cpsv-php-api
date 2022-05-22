<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://xmlns.com/foaf/0.1/Document
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://xmlns.com/foaf/0.1/Document',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Document
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
