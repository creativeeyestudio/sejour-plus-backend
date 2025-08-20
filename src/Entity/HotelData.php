<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\HotelDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    shortName:"Hotel",
    formats: [
        'jsonld' => ['application/ld+json'],
        'json' => ['application/json'],
    ]
)]
#[ORM\Entity(repositoryClass: HotelDataRepository::class)]
class HotelData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $hotel_name = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $hotel_phone = null;

    #[ORM\Column(length: 255)]
    private ?string $hotel_email = null;

    #[ORM\Column(length: 255)]
    private ?string $hotel_map = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hotel_website = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $hotel_check_in = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $hotel_check_out = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hotel_wifi_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hotel_wifi_password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hotel_parking = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotelName(): ?string
    {
        return $this->hotel_name;
    }

    public function setHotelName(string $hotel_name): static
    {
        $this->hotel_name = $hotel_name;

        return $this;
    }

    public function getHotelPhone(): ?string
    {
        return $this->hotel_phone;
    }

    public function setHotelPhone(string $hotel_phone): static
    {
        $this->hotel_phone = $hotel_phone;

        return $this;
    }

    public function getHotelEmail(): ?string
    {
        return $this->hotel_email;
    }

    public function setHotelEmail(string $hotel_email): static
    {
        $this->hotel_email = $hotel_email;

        return $this;
    }

    public function getHotelMap(): ?string
    {
        return $this->hotel_map;
    }

    public function setHotelMap(string $hotel_map): static
    {
        $this->hotel_map = $hotel_map;

        return $this;
    }

    public function getHotelWebsite(): ?string
    {
        return $this->hotel_website;
    }

    public function setHotelWebsite(?string $hotel_website): static
    {
        $this->hotel_website = $hotel_website;

        return $this;
    }

    public function getHotelCheckIn(): ?\DateTime
    {
        return $this->hotel_check_in;
    }

    public function setHotelCheckIn(\DateTime $hotel_check_in): static
    {
        $this->hotel_check_in = $hotel_check_in;

        return $this;
    }

    public function getHotelCheckOut(): ?\DateTime
    {
        return $this->hotel_check_out;
    }

    public function setHotelCheckOut(\DateTime $hotel_check_out): static
    {
        $this->hotel_check_out = $hotel_check_out;

        return $this;
    }

    public function getHotelWifiName(): ?string
    {
        return $this->hotel_wifi_name;
    }

    public function setHotelWifiName(?string $hotel_wifi_name): static
    {
        $this->hotel_wifi_name = $hotel_wifi_name;

        return $this;
    }

    public function getHotelWifiPassword(): ?string
    {
        return $this->hotel_wifi_password;
    }

    public function setHotelWifiPassword(?string $hotel_wifi_password): static
    {
        $this->hotel_wifi_password = $hotel_wifi_password;

        return $this;
    }

    public function getHotelParking(): ?string
    {
        return $this->hotel_parking;
    }

    public function setHotelParking(?string $hotel_parking): static
    {
        $this->hotel_parking = $hotel_parking;

        return $this;
    }
}
