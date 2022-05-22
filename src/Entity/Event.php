<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. This class represents an event that can be of any type that triggers, makes use of, or in some way is related to, a Public Service. It is not expected to be used directly, rather, one or other of its subclasses should be used. The properties of the class are, of course, inherited by those subclasses.
 *
 * @see http://data.europa.eu/m8g/Event
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/Event',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Event
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
