<?php declare(strict_types=1);

namespace App\Json;

interface JsonSerializable extends \JsonSerializable
{
    public function jsonSerialize(): Json;
}