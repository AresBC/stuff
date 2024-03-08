<?php declare(strict_types=1);

namespace App\Json;

use Stringable;

interface ConfigurationModel extends JsonSerializable, Stringable
{
    public function toString(): string;
}