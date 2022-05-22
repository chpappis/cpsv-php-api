<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @see http://purl.org/vocab/cpsv#Rule
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://purl.org/vocab/cpsv#Rule',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
)]
class Rule
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $identifier;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: LinguisticSystem::class)]
    private $language;

    #[ORM\ManyToMany(targetEntity: LegalResource::class)]
    private $implements;

    public function __construct()
    {
        $this->language = new ArrayCollection();
        $this->implements = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    /**
     * @return Collection<int, LegalResource>
     */
    public function getImplements(): Collection
    {
        return $this->implements;
    }

    public function addImplement(LegalResource $implement): self
    {
        if (!$this->implements->contains($implement)) {
            $this->implements[] = $implement;
        }

        return $this;
    }

    public function removeImplement(LegalResource $implement): self
    {
        $this->implements->removeElement($implement);

        return $this;
    }
}
