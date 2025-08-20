<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use App\Repository\ActivityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    shortName:"Activité",
    formats: [
        'jsonld' => ['application/ld+json'],
        'json' => ['application/json'],
    ],
    operations: [
        new Get(uriTemplate: '/activites/{id}'),
        new GetCollection(uriTemplate: '/activites'),
        new Post(uriTemplate: '/activites'),
        new Patch(uriTemplate: '/activites/{id}'),
        new Delete(uriTemplate: '/activites/{id}'),
    ],
)]

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $act_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $act_content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $act_reserve = null;

    #[ORM\ManyToOne(inversedBy: 'activities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $act_category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActName(): ?string
    {
        return $this->act_name;
    }

    public function setActName(string $act_name): static
    {
        $this->act_name = $act_name;

        return $this;
    }

    public function getActContent(): ?string
    {
        return $this->act_content;
    }

    public function setActContent(string $act_content): static
    {
        $this->act_content = $act_content;

        return $this;
    }

    public function getActReserve(): ?string
    {
        return $this->act_reserve;
    }

    public function setActReserve(?string $act_reserve): static
    {
        $this->act_reserve = $act_reserve;

        return $this;
    }

    public function getActCategory(): ?Category
    {
        return $this->act_category;
    }

    public function setActCategory(?Category $act_category): static
    {
        $this->act_category = $act_category;

        return $this;
    }
}
