<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    shortName:"Catégorie",
    formats: [
        'jsonld' => ['application/ld+json'],
        'json' => ['application/json'],
    ],
    operations: [
        new Get(uriTemplate: '/categories/{id}'),
        new GetCollection(uriTemplate: '/categories'),
        new GetCollection(
            uriTemplate: '/categories/hotel-internal/{hotel_internal}',
            uriVariables: 'hotel_internal',
            requirements: ['hotel_internal' => '1|0'],
        ),
        new Post(uriTemplate: '/categories'),
        new Patch(uriTemplate: '/categories/{id}'),
        new Delete(uriTemplate: '/categories/{id}'),
    ],
)]

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cat_name = null;

    /**
     * @var Collection<int, Activity>
     */
    #[ORM\OneToMany(targetEntity: Activity::class, mappedBy: 'act_category')]
    private Collection $activities;

    #[ORM\Column]
    private ?bool $hotel_internal = null;

    /**
     * @var Collection<int, Tourism>
     */
    #[ORM\OneToMany(targetEntity: Tourism::class, mappedBy: 'tourism_category')]
    private Collection $tourisms;

    public function __construct()
    {
        $this->activities = new ArrayCollection();
        $this->tourisms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatName(): ?string
    {
        return $this->cat_name;
    }

    public function setCatName(string $cat_name): static
    {
        $this->cat_name = $cat_name;

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): static
    {
        if (!$this->activities->contains($activity)) {
            $this->activities->add($activity);
            $activity->setActCategory($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): static
    {
        if ($this->activities->removeElement($activity)) {
            // set the owning side to null (unless already changed)
            if ($activity->getActCategory() === $this) {
                $activity->setActCategory(null);
            }
        }

        return $this;
    }

    public function isHotelInternal(): ?bool
    {
        return $this->hotel_internal;
    }

    public function setHotelInternal(bool $hotel_internal): static
    {
        $this->hotel_internal = $hotel_internal;

        return $this;
    }

    /**
     * @return Collection<int, Tourism>
     */
    public function getTourisms(): Collection
    {
        return $this->tourisms;
    }

    public function addTourism(Tourism $tourism): static
    {
        if (!$this->tourisms->contains($tourism)) {
            $this->tourisms->add($tourism);
            $tourism->setTourismCategory($this);
        }

        return $this;
    }

    public function removeTourism(Tourism $tourism): static
    {
        if ($this->tourisms->removeElement($tourism)) {
            // set the owning side to null (unless already changed)
            if ($tourism->getTourismCategory() === $this) {
                $tourism->setTourismCategory(null);
            }
        }

        return $this;
    }
}
