<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://data.europa.eu/m8g/PublicServiceDataset
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/PublicServiceDataset',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class PublicServiceDataset
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $identifier;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Agent::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $publisher;

    #[ORM\ManyToMany(targetEntity: Document::class)]
    private $landingPage;

    public function __construct()
    {
        $this->landingPage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPublisher(): ?Agent
    {
        return $this->publisher;
    }

    public function setPublisher(?Agent $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getLandingPage(): Collection
    {
        return $this->landingPage;
    }

    public function addLandingPage(Document $landingPage): self
    {
        if (!$this->landingPage->contains($landingPage)) {
            $this->landingPage[] = $landingPage;
        }

        return $this;
    }

    public function removeLandingPage(Document $landingPage): self
    {
        $this->landingPage->removeElement($landingPage);

        return $this;
    }
}
