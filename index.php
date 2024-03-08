<?php

use App\Model\Address;
use App\Model\Person;
use App\Model\Team;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';


$teamData = [
    [
        'id' => 1,
        'firstName' => 'Peter',
        'lastName' => 'Lustig',
        'age' => 23,
        'address' => [
            'country' => 'Germany',
            'city' => 'Lüneburg',
            'plz' => 21337,
            'street' => 'Gartenstraße',
            'streetNumber' => '20a',
        ]
    ],
    [
        'id' => 2,
        'firstName' => 'Andrea',
        'lastName' => 'Petersen',
        'age' => 33,
        'address' => [
            'country' => 'Germany',
            'city' => 'Lüneburg',
            'plz' => 21337,
            'street' => 'Hauptstraße',
            'streetNumber' => '43',
        ]
    ],
];

$team = new Team();
foreach ($teamData as $memberData) {
    $team->addMember(new Person(
        $memberData['id'],
        $memberData['firstName'],
        $memberData['lastName'],
        $memberData['age'],
        new Address(
            $memberData['address']['country'],
            $memberData['address']['city'],
            $memberData['address']['plz'],
            $memberData['address']['street'],
            $memberData['address']['streetNumber'],
        )
    ));
}


mark('RESULT', $team->jsonSerialize()->toString());
