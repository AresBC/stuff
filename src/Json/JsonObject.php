<?php declare(strict_types=1);

namespace App\Json;

use App\Json\Json;

class JsonObject implements Json
{

    private array $data;

    public function __construct(object|array $data)
    {
        $this->data = is_object($data)
            ? (array)$data
            : $data;
    }


    public function toString(): string
    {
        return json_encode($this->data);
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}