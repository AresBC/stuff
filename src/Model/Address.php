<?php declare(strict_types=1);

namespace App\Model;

use App\Json\Json;
use App\Json\JsonSerializable;
use App\Json\JsonObject;

class Address implements JsonSerializable
{
    private string $country;
    private string $city;
    private int $plz;
    private string $street;
    private string $streetNumber;

    public function __construct(string $country, string $city, int $plz, string $street, string $streetNumber)
    {
        $this->country = $country;
        $this->city = $city;
        $this->plz = $plz;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
    }


    public function jsonSerialize(): Json
    {
        return new JsonObject([
            'country'      => $this->country,
            'city'         => $this->city,
            'plz'          => $this->plz,
            'street'       => $this->street,
            'streetNumber' => $this->streetNumber,
        ]);
    }
}