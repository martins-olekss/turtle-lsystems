<?php
require_once 'src/Lsystems.php';

$ls = new Lsystems();
$settings = [
    'imageWidth' => 2200,
    'imageHeight' => 2200,
    'startPosition' => [600, 600],
    'iterations' => 130,
    'startInput' => '+F-F+YX-F+F-X',
    'rotate' => 33.5,
    'move' => 40,
    'rules' => [
        ['X', '+YF−XFX−FY+'],
        ['Y', '−XF+YFY+FX−']
    ]
];

$ls->settings($settings);
$ls->execute();