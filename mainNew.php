<?php
require_once 'src/LsystemsNew.php';

$ls = new LsystemsNew();
$settings =
[
    'imageWidth' => 5700,
    'imageHeight' => 5700,
    'startPosition' => [2030, 2060],
    'iterations' => 20,
    'startInput' => 'X',
    'rotate' => 90,
    'move' => 30,
    'rules' => [
        ['X','+YF-XFX-FY+'],
        ['Y','-YF+XFX+FY-']
    ]
];
mt_srand(352476347961239);
$ls->settings($settings)->init();
$ls->execute()->gif();