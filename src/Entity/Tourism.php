<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use App\Repository\TourismRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    shortName:"Lieu touristique",
    formats: [
        'jsonld' => ['application/ld+json'],
        'json' => ['application/json'],
    ],
    operations: [
        new Get(uriTemplate: '/tourism/{id}'),
        new GetCollection(uriTemplate: '/tourism'),
        new Post(uriTemplate: '/tourism'),
        new Patch(uriTemplate: '/tourism/{id}'),
        new Delete(uriTemplate: '/tourism/{id}'),
    ],
)]

#[ORM\Entity(repositoryClass: TourismRepository::class)]
class Tourism
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tourism_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tourism_content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tourism_reserve = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tourism_phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tourism_website = null;

    #[ORM\ManyToOne(inversedBy: 'tourisms')]
    private ?Category $tourism_category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTourismName(): ?string
    {
        return $this->tourism_name;
    }

    public function setTourismName(string $tourism_name): static
    {
        $this->tourism_name = $tourism_name;

        return $this;
    }

    public function getTourismContent(): ?string
    {
        return $this->tourism_content;
    }

    public function setTourismContent(string $tourism_content): static
    {
        $this->tourism_content = $tourism_content;

        return $this;
    }

    public function getTourismReserve(): ?string
    {
        return $this->tourism_reserve;
    }

    public function setTourismReserve(?string $tourism_reserve): static
    {
        $this->tourism_reserve = $tourism_reserve;

        return $this;
    }

    public function getTourismPhone(): ?string
    {
        return $this->tourism_phone;
    }

    public function setTourismPhone(?string $tourism_phone): static
    {
        $this->tourism_phone = $tourism_phone;

        return $this;
    }

    public function getTourismCategory(): ?Category
    {
        return $this->tourism_category;
    }

    public function setTourismCategory(?Category $tourism_category): static
    {
        $this->tourism_category = $tourism_category;

        return $this;
    }

    public function getTourismWebsite(): ?string
    {
        return $this->tourism_website;
    }

    public function setTourismWebsite(?string $tourism_website): static
    {
        $this->tourism_website = $tourism_website;

        return $this;
    }
}
