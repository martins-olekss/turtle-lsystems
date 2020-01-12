<?php
require_once 'src/Lsystems.php';

$ls = new Lsystems();
$settings =
[
    'imageWidth' => 5700,
    'imageHeight' => 5700,
    'startPosition' => [2030, 2060],
    'iterations' => 100,
    'startInput' => 'X-Y-X+YY-XX+Y+X+Y',
    'rotate' => 22,
    'move' => 30,
    'rules' => [
        ['X','+YF-XFX-FY+'],
        ['Y','-YF+XFY-'],
        ['-X','+YF-XY+'],
        ['+Y','-YFX+FY-'],
    ]
];
mt_srand(352476347961239);
$ls->settings($settings)->init();
$ls->execute()->gif();