<?php
require_once 'src/Lsystems.php';

$ls = new Lsystems();
$settings =
    [
        'imageWidth' => $_GET['imageWidth'],
        'imageHeight' => $_GET['imageHeight'],
        'startPosition' => [$_GET['startPositionX'], $_GET['startPositionY']],
        'iterations' => $_GET['iterations'],
        'startInput' => $_GET['startInput'],
        'rotate' => $_GET['rotate'],
        'move' => $_GET['move'],
        'rules' => json_decode($_GET['rules'])
    ];

$ls->settings($settings)->init();
$ls->execute()->png();