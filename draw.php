<?php
require_once 'src/Lsystems.php';
//TODO: Plan for JSON input
$data = json_decode(file_get_contents('php://input'), true);
$ls = new Lsystems();
$settings =
    [
        'imageWidth' => $data['imageWidth'],
        'imageHeight' => $data['imageHeight'],
        'startPosition' => [$data['startPositionX'], $data['startPositionY']],
        'iterations' => $data['iterations'],
        'startInput' => $data['startInput'],
        'rotate' => $data['rotate'],
        'move' => $data['move'],
        'rules' => $data['rules']
    ];
$ls->settings($settings)->init();
$ls->execute()->png(true);