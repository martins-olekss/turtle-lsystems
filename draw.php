<?php
require_once 'src/Lsystems.php';
$data = json_decode(file_get_contents('php://input'), true);
$ls = new Lsystems();
$settings =
    [
        'imageWidth' => $data['imageWidth'],
        'imageHeight' => $data['imageHeight'],
        'startPosition' => [$data['startPosition'][0], $data['startPosition'][1]],
        'iterations' => $data['iterations'],
        'startInput' => $data['startInput'],
        'rotate' => $data['rotate'],
        'move' => $data['move'],
        'rules' => $data['rules']
    ];
$ls->settings($settings)->init();
$ls->execute()->png(true);