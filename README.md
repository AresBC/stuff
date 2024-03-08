Just some stuff.


<?php

class JsonObject {
    private $data = [];

    public function add($key, $value) {
        $this->data[$key] = $value;
    }

    public function toJson() {
        $result = [];
        foreach ($this->data as $key => $value) {
            if ($value instanceof JsonObject || $value instanceof JsonArray) {
                $result[$key] = json_decode($value->toJson());
            } else {
                $result[$key] = $value;
            }
        }
        return json_encode($result);
    }
}

class JsonArray {
    private $data = [];

    public function add($value) {
        $this->data[] = $value;
    }

    public function toJson() {
        $result = [];
        foreach ($this->data as $value) {
            if ($value instanceof JsonObject || $value instanceof JsonArray) {
                $result[] = json_decode($value->toJson());
            } else {
                $result[] = $value;
            }
        }
        return json_encode($result);
    }
}

// Beispiel zur Verwendung
$obj = new JsonObject();
$obj->add("name", "John");
$obj->add("age", 30);

$address = new JsonObject();
$address->add("city", "New York");
$address->add("country", "USA");

$obj->add("address", $address);

$skills = new JsonArray();
$skills->add("Programming");
$skills->add("Design");

$obj->add("skills", $skills);

echo $obj->toJson();
