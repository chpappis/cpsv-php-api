<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @see http://purl.org/vocab/cpsv#PublicService
 */
#[ORM\Entity]
#[ApiResource(
    iri: 'http://purl.org/vocab/cpsv#PublicService',
    collectionOperations: ['get','post'],
    itemOperations: ['get','put','delete'],
    normalizationContext: ['groups' => ['publicservicegroup']],
    attributes: ["force_eager"=>false]
)]
//#[ApiFilter(SearchFilter::class, properties: ['id' => 'exact', 'identifier' => 'exact', 'name' => 'partial'])]
//#[ApiFilter(SearchFilter::class, strategy: 'partial')]
#[ApiFilter(SearchFilter::class, properties: ['identifier' => 'exact', 
                                                'name' => 'exact', 
                                                'description' => 'partial',
                                                'hasCompetentAuthority.preferredLabel' => 'exact',
                                                'isGroupedBy.name' => 'exact',
                                                'produces.name' => 'exact',
                                                'requires.name' => 'exact',
                                                'related.name' => 'exact'
                                                ])]
class PublicService
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    #[Groups("publicservicegroup")]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("publicservicegroup")]
    private $identifier;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("publicservicegroup")]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("publicservicegroup")]
    private $description;

    #[ORM\Column(type: 'dateinterval', nullable: true)]
    #[Groups("publicservicegroup")]
    private $processingTime;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups("publicservicegroup")]
    private $keyword;

    #[ORM\ManyToMany(targetEntity: Concept::class)]
    #[ORM\JoinTable(name:"public_service_concept_sector")]
    #[Groups("publicservicegroup")]
    private $sector;

    #[ORM\ManyToMany(targetEntity: Concept::class)]
    #[ORM\JoinTable(name:"public_service_concept_thematicArea")]
    #[Groups("publicservicegroup")]
    private $thematicArea;

    #[ORM\ManyToMany(targetEntity: Concept::class)]
    #[ORM\JoinTable(name:"public_service_concept_type")]
    #[Groups("publicservicegroup")]
    private $type;

    #[ORM\ManyToMany(targetEntity: LinguisticSystem::class)]
    #[Groups("publicservicegroup")]
    private $language;

    #[ORM\ManyToOne(targetEntity: Concept::class)]
    #[ORM\JoinTable(name:"public_service_concept_status")]
    #[Groups("publicservicegroup")]
    private $status;

    #[ORM\ManyToMany(targetEntity: Event::class)]
    #[Groups("publicservicegroup")]
    private $isGroupedBy;

    #[ORM\ManyToMany(targetEntity: self::class)]
    #[ORM\JoinTable(name:"public_service_public_service_requires")]
    #[Groups("publicservicegroup")]
    private $requires;

    #[ORM\ManyToMany(targetEntity: self::class)]
    #[ORM\JoinTable(name:"public_service_public_service_related")]
    #[Groups("publicservicegroup")]
    private $related;

    #[ORM\ManyToMany(targetEntity: CriterionRequirement::class)]
    #[Groups("publicservicegroup")]
    private $hasCriterion;

    #[ORM\ManyToOne(targetEntity: PublicOrganisation::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups("publicservicegroup")]
    private $hasCompetentAuthority;

    #[ORM\ManyToMany(targetEntity: Participation::class)]
    #[Groups("publicservicegroup")]
    private $hasParticipation;

    #[ORM\ManyToMany(targetEntity: Evidence::class)]
    #[Groups("publicservicegroup")]
    private $hasInput;

    #[ORM\ManyToMany(targetEntity: LegalResource::class)]
    #[Groups("publicservicegroup")]
    private $hasLegalResource;

    #[ORM\ManyToMany(targetEntity: Output::class)]
    #[Groups("publicservicegroup")]
    private $produces;

    #[ORM\ManyToMany(targetEntity: Rule::class)]
    #[Groups("publicservicegroup")]
    private $follows;

    #[ORM\ManyToMany(targetEntity: Location::class)]
    #[Groups("publicservicegroup")]
    private $spatial;

    #[ORM\ManyToMany(targetEntity: ContactPoint::class)]
    #[Groups("publicservicegroup")]
    private $hasContactPoint;

    #[ORM\ManyToMany(targetEntity: Channel::class)]
    #[Groups("publicservicegroup")]
    private $hasChannel;

    #[ORM\ManyToMany(targetEntity: Cost::class)]
    #[Groups("publicservicegroup")]
    private $hasCost;

    #[ORM\ManyToMany(targetEntity: PublicServiceDataset::class)]
    #[Groups("publicservicegroup")]
    private $isDescribedAt;

    #[ORM\ManyToMany(targetEntity: Concept::class)]
    #[ORM\JoinTable(name:"public_service_concept_isClassifiedBy")]
    #[Groups("publicservicegroup")]
    private $isClassifiedBy;

    public function __construct()
    {
        $this->sector = new ArrayCollection();
        $this->thematicArea = new ArrayCollection();
        $this->type = new ArrayCollection();
        $this->language = new ArrayCollection();
        $this->isGroupedBy = new ArrayCollection();
        $this->requires = new ArrayCollection();
        $this->related = new ArrayCollection();
        $this->hasCriterion = new ArrayCollection();
        $this->hasParticipation = new ArrayCollection();
        $this->hasInput = new ArrayCollection();
        $this->hasLegalResource = new ArrayCollection();
        $this->produces = new ArrayCollection();
        $this->follows = new ArrayCollection();
        $this->spatial = new ArrayCollection();
        $this->hasContactPoint = new ArrayCollection();
        $this->hasChannel = new ArrayCollection();
        $this->hasCost = new ArrayCollection();
        $this->isDescribedAt = new ArrayCollection();
        $this->isClassifiedBy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // setId needed because of custom data provider PublicServiceCollectionDataProvider.php
    public function setId(int $id)
    {
        $this->id = $id;
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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProcessingTime(): ?\DateInterval
    {
        return $this->processingTime;
    }

    public function setProcessingTime(?\DateInterval $processingTime): self
    {
        $this->processingTime = $processingTime;

        return $this;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function setKeyword(?string $keyword): self
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * @return Collection<int, Concept>
     */
    public function getSector(): Collection
    {
        return $this->sector;
    }

    public function addSector(Concept $sector): self
    {
        if (!$this->sector->contains($sector)) {
            $this->sector[] = $sector;
        }

        return $this;
    }

    public function removeSector(Concept $sector): self
    {
        $this->sector->removeElement($sector);

        return $this;
    }

    /**
     * @return Collection<int, Concept>
     */
    public function getThematicArea(): Collection
    {
        return $this->thematicArea;
    }

    public function addThematicArea(Concept $thematicArea): self
    {
        if (!$this->thematicArea->contains($thematicArea)) {
            $this->thematicArea[] = $thematicArea;
        }

        return $this;
    }

    public function removeThematicArea(Concept $thematicArea): self
    {
        $this->thematicArea->removeElement($thematicArea);

        return $this;
    }

    /**
     * @return Collection<int, Concept>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Concept $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
        }

        return $this;
    }

    public function removeType(Concept $type): self
    {
        $this->type->removeElement($type);

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

    public function getStatus(): ?Concept
    {
        return $this->status;
    }

    public function setStatus(?Concept $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getIsGroupedBy(): Collection
    {
        return $this->isGroupedBy;
    }

    public function addIsGroupedBy(Event $isGroupedBy): self
    {
        if (!$this->isGroupedBy->contains($isGroupedBy)) {
            $this->isGroupedBy[] = $isGroupedBy;
        }

        return $this;
    }

    public function removeIsGroupedBy(Event $isGroupedBy): self
    {
        $this->isGroupedBy->removeElement($isGroupedBy);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getRequires(): Collection
    {
        return $this->requires;
    }

    public function addRequire(self $require): self
    {
        if (!$this->requires->contains($require)) {
            $this->requires[] = $require;
        }

        return $this;
    }

    public function removeRequire(self $require): self
    {
        $this->requires->removeElement($require);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getRelated(): Collection
    {
        return $this->related;
    }

    public function addRelated(self $related): self
    {
        if (!$this->related->contains($related)) {
            $this->related[] = $related;
        }

        return $this;
    }

    public function removeRelated(self $related): self
    {
        $this->related->removeElement($related);

        return $this;
    }

    /**
     * @return Collection<int, CriterionRequirement>
     */
    public function getHasCriterion(): Collection
    {
        return $this->hasCriterion;
    }

    public function addHasCriterion(CriterionRequirement $hasCriterion): self
    {
        if (!$this->hasCriterion->contains($hasCriterion)) {
            $this->hasCriterion[] = $hasCriterion;
        }

        return $this;
    }

    public function removeHasCriterion(CriterionRequirement $hasCriterion): self
    {
        $this->hasCriterion->removeElement($hasCriterion);

        return $this;
    }

    public function getHasCompetentAuthority(): ?PublicOrganisation
    {
        return $this->hasCompetentAuthority;
    }

    public function setHasCompetentAuthority(?PublicOrganisation $hasCompetentAuthority): self
    {
        $this->hasCompetentAuthority = $hasCompetentAuthority;

        return $this;
    }

    /**
     * @return Collection<int, Participation>
     */
    public function getHasParticipation(): Collection
    {
        return $this->hasParticipation;
    }

    public function addHasParticipation(Participation $hasParticipation): self
    {
        if (!$this->hasParticipation->contains($hasParticipation)) {
            $this->hasParticipation[] = $hasParticipation;
        }

        return $this;
    }

    public function removeHasParticipation(Participation $hasParticipation): self
    {
        $this->hasParticipation->removeElement($hasParticipation);

        return $this;
    }

    /**
     * @return Collection<int, Evidence>
     */
    public function getHasInput(): Collection
    {
        return $this->hasInput;
    }

    public function addHasInput(Evidence $hasInput): self
    {
        if (!$this->hasInput->contains($hasInput)) {
            $this->hasInput[] = $hasInput;
        }

        return $this;
    }

    public function removeHasInput(Evidence $hasInput): self
    {
        $this->hasInput->removeElement($hasInput);

        return $this;
    }

    /**
     * @return Collection<int, LegalResource>
     */
    public function getHasLegalResource(): Collection
    {
        return $this->hasLegalResource;
    }

    public function addHasLegalResource(LegalResource $hasLegalResource): self
    {
        if (!$this->hasLegalResource->contains($hasLegalResource)) {
            $this->hasLegalResource[] = $hasLegalResource;
        }

        return $this;
    }

    public function removeHasLegalResource(LegalResource $hasLegalResource): self
    {
        $this->hasLegalResource->removeElement($hasLegalResource);

        return $this;
    }

    /**
     * @return Collection<int, Output>
     */
    public function getProduces(): Collection
    {
        return $this->produces;
    }

    public function addProduce(Output $produce): self
    {
        if (!$this->produces->contains($produce)) {
            $this->produces[] = $produce;
        }

        return $this;
    }

    public function removeProduce(Output $produce): self
    {
        $this->produces->removeElement($produce);

        return $this;
    }

    /**
     * @return Collection<int, Rule>
     */
    public function getFollows(): Collection
    {
        return $this->follows;
    }

    public function addFollow(Rule $follow): self
    {
        if (!$this->follows->contains($follow)) {
            $this->follows[] = $follow;
        }

        return $this;
    }

    public function removeFollow(Rule $follow): self
    {
        $this->follows->removeElement($follow);

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getSpatial(): Collection
    {
        return $this->spatial;
    }

    public function addSpatial(Location $spatial): self
    {
        if (!$this->spatial->contains($spatial)) {
            $this->spatial[] = $spatial;
        }

        return $this;
    }

    public function removeSpatial(Location $spatial): self
    {
        $this->spatial->removeElement($spatial);

        return $this;
    }

    /**
     * @return Collection<int, ContactPoint>
     */
    public function getHasContactPoint(): Collection
    {
        return $this->hasContactPoint;
    }

    public function addHasContactPoint(ContactPoint $hasContactPoint): self
    {
        if (!$this->hasContactPoint->contains($hasContactPoint)) {
            $this->hasContactPoint[] = $hasContactPoint;
        }

        return $this;
    }

    public function removeHasContactPoint(ContactPoint $hasContactPoint): self
    {
        $this->hasContactPoint->removeElement($hasContactPoint);

        return $this;
    }

    /**
     * @return Collection<int, Channel>
     */
    public function getHasChannel(): Collection
    {
        return $this->hasChannel;
    }

    public function addHasChannel(Channel $hasChannel): self
    {
        if (!$this->hasChannel->contains($hasChannel)) {
            $this->hasChannel[] = $hasChannel;
        }

        return $this;
    }

    public function removeHasChannel(Channel $hasChannel): self
    {
        $this->hasChannel->removeElement($hasChannel);

        return $this;
    }

    /**
     * @return Collection<int, Cost>
     */
    public function getHasCost(): Collection
    {
        return $this->hasCost;
    }

    public function addHasCost(Cost $hasCost): self
    {
        if (!$this->hasCost->contains($hasCost)) {
            $this->hasCost[] = $hasCost;
        }

        return $this;
    }

    public function removeHasCost(Cost $hasCost): self
    {
        $this->hasCost->removeElement($hasCost);

        return $this;
    }

    /**
     * @return Collection<int, PublicServiceDataset>
     */
    public function getIsDescribedAt(): Collection
    {
        return $this->isDescribedAt;
    }

    public function addIsDescribedAt(PublicServiceDataset $isDescribedAt): self
    {
        if (!$this->isDescribedAt->contains($isDescribedAt)) {
            $this->isDescribedAt[] = $isDescribedAt;
        }

        return $this;
    }

    public function removeIsDescribedAt(PublicServiceDataset $isDescribedAt): self
    {
        $this->isDescribedAt->removeElement($isDescribedAt);

        return $this;
    }

    /**
     * @return Collection<int, Concept>
     */
    public function getIsClassifiedBy(): Collection
    {
        return $this->isClassifiedBy;
    }

    public function addIsClassifiedBy(Concept $isClassifiedBy): self
    {
        if (!$this->isClassifiedBy->contains($isClassifiedBy)) {
            $this->isClassifiedBy[] = $isClassifiedBy;
        }

        return $this;
    }

    public function removeIsClassifiedBy(Concept $isClassifiedBy): self
    {
        $this->isClassifiedBy->removeElement($isClassifiedBy);

        return $this;
    }
}
