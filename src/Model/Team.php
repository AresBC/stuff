<?php declare(strict_types=1);

namespace App\Model;

use App\Json\Json;
use App\Json\JsonArray;
use App\Json\JsonSerializable;
use SplObjectStorage;

class Team implements JsonSerializable
{
    private readonly SplObjectStorage $members;
    public function __construct()
    {
        $this->members = new SplObjectStorage();
    }
    public function addMember(Person $member): void
    {
        $this->members->attach($member);
    }
    public function getMembers(): array
    {
        return iterator_to_array($this->members);
    }

    public function removeMember($member): void
    {
        $this->members->detach($member);
    }


    public function jsonSerialize(): Json
    {
        /** @var Person $member */
        $members = array_map(fn($member) => $member->jsonSerialize(), $this->getMembers());
        return new JsonArray($members);
    }
}