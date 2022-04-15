<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. The Channel class represents the medium through which an Agent provides, uses or interacts in another way with a Public Service. Typical examples include online services, phone, walk-in centres etc.
 *
 * @see http://data.europa.eu/m8g/Channel
 */
#[ORM\Entity]
#[ApiResource(iri: 'http://data.europa.eu/m8g/Channel')]
class Channel
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
