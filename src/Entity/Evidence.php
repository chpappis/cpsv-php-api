<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://data.europa.eu/m8g/Evidence
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://data.europa.eu/m8g/Evidence',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Evidence
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    #[Groups("publicservicegroup")]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    //#[Groups("publicservicegroup")]
    private $identifier;

    #[ORM\Column(type: 'string', length: 255)]
    //#[Groups("publicservicegroup")]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    //#[Groups("publicservicegroup")]
    private $description;

    #[ORM\ManyToOne(targetEntity: Concept::class)]
    //#[Groups("publicservicegroup")]
    private $type;

    #[ORM\ManyToMany(targetEntity: Document::class)]
    //#[Groups("publicservicegroup")]
    private $relatedDocumentation;

    #[ORM\ManyToMany(targetEntity: LinguisticSystem::class)]
    //#[Groups("publicservicegroup")]
    private $language;

    public function __construct()
    {
        $this->relatedDocumentation = new ArrayCollection();
        $this->language = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?Concept
    {
        return $this->type;
    }

    public function setType(?Concept $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getRelatedDocumentation(): Collection
    {
        return $this->relatedDocumentation;
    }

    public function addRelatedDocumentation(Document $relatedDocumentation): self
    {
        if (!$this->relatedDocumentation->contains($relatedDocumentation)) {
            $this->relatedDocumentation[] = $relatedDocumentation;
        }

        return $this;
    }

    public function removeRelatedDocumentation(Document $relatedDocumentation): self
    {
        $this->relatedDocumentation->removeElement($relatedDocumentation);

        return $this;
    }

    /**
     * @return Collection<int, LinguisticSystem>
     */
    public function getLanguage(): Collection
    {
        return $this->language;
    }

    public function addLanguage(LinguisticSystem $language): self
    {
        if (!$this->language->contains($language)) {
            $this->language[] = $language;
        }

        return $this;
    }

    public function removeLanguage(LinguisticSystem $language): self
    {
        $this->language->removeElement($language);

        return $this;
    }
}
