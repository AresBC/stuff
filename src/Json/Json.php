<?php declare(strict_types=1);

namespace App\Json;

interface Json
{
    public function toString(): string;
    public function __toString(): string;
}