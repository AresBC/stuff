<?php declare(strict_types=1);

namespace App\Model;

use App\Json\Json;
use App\Json\JsonSerializable;
use App\Json\JsonObject;

class Person extends Model implements JsonSerializable
{
    public readonly int $id;
    public string $firstName;
    public string $lastName;

    public int $age;
    public Address $address;

    public function __construct(int $id, string $firstName, string $lastName, int $age, Address $address)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->address = $address;
    }

    public function jsonSerialize(): Json
    {
        return new JsonObject([
            'id'        => $this->id,
            'firstName' => $this->firstName,
            'lastName'  => $this->lastName,
            'age'       => $this->age,
            'address'   => $this->address->jsonSerialize(),
        ]);
    }
}