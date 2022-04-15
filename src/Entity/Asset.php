<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://www.w3.org/ns/adms#Asset
 */
#[ORM\Entity]
#[ApiResource(iri: 'http://www.w3.org/ns/adms#Asset')]
class Asset
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
