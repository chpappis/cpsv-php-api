<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Optional class. This class represents a Business Event, which specialises Event. A Business Event is a specific situation or event in the lifecycle of a business that fulfils one or more needs or (legal) obligations of that business at this specific point in time. A Business Event requires a set of public services to be delivered and consumed in order for the associated business need(s) or obligation(s) to be fulfilled. Business Events are defined within the context of a particular Member State. In other words, a Business Event groups together a number of public services that need to be delivered for completing that particular event.
 *
 * @see http://data.europa.eu/m8g/BusinessEvent
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/BusinessEvent',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class BusinessEvent
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
