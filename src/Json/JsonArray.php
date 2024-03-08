<?php declare(strict_types=1);

namespace App\Json;

use App\Json\Json;

class JsonArray implements Json
{

    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function toString(): string
    {
        mark('json_encode', json_encode($this->data));
        mark('json_encode', ($this->data));
        die;
        return json_encode($this->data);
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}