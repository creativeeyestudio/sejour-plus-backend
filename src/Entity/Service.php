<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ServiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    shortName:"Service",
    formats: [
        'jsonld' => ['application/ld+json'],
        'json' => ['application/json'],
    ]
)]

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $service_name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $service_desc = null;

    #[ORM\Column]
    private ?int $service_pos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceName(): ?string
    {
        return $this->service_name;
    }

    public function setServiceName(string $service_name): static
    {
        $this->service_name = $service_name;

        return $this;
    }

    public function getServiceDesc(): ?string
    {
        return $this->service_desc;
    }

    public function setServiceDesc(string $service_desc): static
    {
        $this->service_desc = $service_desc;

        return $this;
    }

    public function getServicePos(): ?int
    {
        return $this->service_pos;
    }

    public function setServicePos(int $service_pos): static
    {
        $this->service_pos = $service_pos;

        return $this;
    }
}
