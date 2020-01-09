<?php
require 'src/phpturtle/turtle.php';
const IMAGE_WIDTH = 2300;
const IMAGE_HEIGHT = 2300;
const MOVE_DISTANCE = 40;
const ROTATE_ANGLE = 33.5;
const START_POSITION = [600, 600];
const START_STRING = '+F-F+YX-F+F-X';
const ITERATIONS = 130;
const RULES = [
    ['X', '+YF−XFX−FY+'],
    ['Y', '−XF+YFY+FX−']
];

$im = new Image(IMAGE_WIDTH, IMAGE_HEIGHT, 0,0,0);
$turtle = new Turtle($im);
//$turtle->font = 'FreeMono.ttf';

function lsystem($string) {
    foreach (RULES as $rule) {
        $string = str_replace($rule[0], $rule[1], $string);
    }

    return $string;
}

function translate($inputArray, Turtle $turtle) {
    foreach ($inputArray as $char) {
        switch ($char) {
            case 'F':
                $turtle->move(MOVE_DISTANCE);
                break;
            case '-':
                $turtle->set_color(250, 150, 19, 10);
                $turtle->rotate(- ROTATE_ANGLE);
                break;
            case '+':
                $turtle->set_color(20, 240, 90, 100);
                $turtle->rotate(ROTATE_ANGLE);
                break;
        }
    }
}

function drawLsystem($input, Turtle $turtle, Image $im) {
    $inputArray = str_split($input);
    $turtle->set_color(255, 128, 64, 0);
    $turtle->goto(20, 20);
    $turtle->goto(START_POSITION[0], START_POSITION[1]);
    $turtle->set_color(200, 5, 9, 20);
    for($i=0; $i <= ITERATIONS; $i ++) {
        translate($inputArray, $turtle);
    }

    $im->send_gif();
}

$output = lsystem(START_STRING);
drawLsystem($output, $turtle, $im);