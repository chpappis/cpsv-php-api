<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Optional class. Outputs can be any resource - document, artefact – anything produced by the Public Service. In the context of a Public Service, the output provides an official document or other artefact of the Competent Authority (Public Organisation) that permits/authorises/entitles an Agent to (do) something.
 *
 * @see http://data.europa.eu/m8g/Output
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/Output',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Output
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
