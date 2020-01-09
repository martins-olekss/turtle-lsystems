<?php
require_once 'src/Lsystems.php';

$ls = new Lsystems();
$settings = [
    'imageWidth' => 5000,
    'imageHeight' => 5000,
    'startPosition' => [2000, 2500],
    'iterations' => 200,
    'startInput' => '+YF−XFF--BK+AH-UO-Y+',
    'rotate' => 45.5,
    'move' => 15,
    'rules' => [
        ['X', '-YF+X-FF-F+XF+-'],
        ['X', '-YF+X-FF+XF+-'],
        ['XF', '+−FY+'],
        ['XF', '+−FY-'],
        ['XF', '+−FY+'],
        ['F', '−XFX−F+BY-XF+'],
        ['F', '−XFX−-XF+']
    ]
];

$ls->settings($settings)->init();
$ls->execute();