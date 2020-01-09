<?php
require_once 'src/Lsystems.php';

$ls = new Lsystems();
$settings = [
    'imageWidth' => 5000,
    'imageHeight' => 5000,
    'startPosition' => [2000, 2500],
    'iterations' => 100,
    'startInput' => '+YF−XFF-FXFF-BK+AX-XF-FXFF+H-UO-Y+',
    'rotate' => 43.5,
    'move' => 2,
    'rules' => [
        ['X', '-YF+X-FF-F+XF+-'],
        ['X', '-YF+X-FF+XF+-'],
        ['Y', '+−A+B-FY--F+FY-'],
        ['F', '−XFXY-XF+'],
        ['X', '-YF+X-FF+XF+-'],
        ['F', '−XFX−-XF+']
    ]
];
mt_srand(352476347961239);
$ls->settings($settings)->init();
$ls->execute();