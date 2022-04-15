<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. The Life Event class represents an important event or situations in a citizen's life where public services may be required. Note the scope: an individual will encounter any number of 'events' in the general sense of the word. In the context of the CPSV-AP, the Life Event class only represents an event for which a Public Service is related. For example, a couple becoming engaged is not a CPSV-AP Life Event, getting married is, since only the latter has any relevance to public services.
 *
 * @see http://data.europa.eu/m8g/LifeEvent
 */
#[ORM\Entity]
#[ApiResource(iri: 'http://data.europa.eu/m8g/LifeEvent')]
class LifeEvent
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
