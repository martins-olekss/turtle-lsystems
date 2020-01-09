<?php
require_once 'phpturtle/turtle.php';

class Lsystems
{
    public $settings = [
        'imageWidth' => 1200,
        'imageHeight' => 1200,
        'startPosition' => [300, 300],
        'iterations' => 100,
        'startInput' => '+F-F+YX-F+F-X',
        'rotate' => 30,
        'move' => 20,
        'rules' => [
            ['X', '+YF−XFX−FY+'],
            ['Y', '−XF+YFY+FX−']
        ]
    ];
    public $image;
    public $turtle;
    public $string = [];

    public function __construct()
    {

    }

    public function settings(array $settings) {
        $this->settings = $settings;

        return $this;
    }

    public function init() {
        $this->image = new Image($this->settings['imageWidth'], $this->settings['imageHeight'], 0, 0, 0);
        $this->turtle = new Turtle($this->image);
    }

    public function execute()
    {
        $this->string[] = $this->morph($this->settings['startInput']);
        $this->draw($this->string[0]);
        $this->image->send_gif();
    }

    /**
     * @param $string
     * @return mixed
     */
    public function morph($string)
    {
        // TODO: Add ability to have multiple morph iterations
        foreach ($this->settings['rules'] as $rule) {
            $string = str_replace($rule[0], $rule[1], $string);
        }

        return $string;
    }

    /**
     * @param array $input
     */
    public function operateTurtle(array $input)
    {
        foreach ($input as $char) {
            switch ($char) {
                case 'F':
                    $this->turtle->move($this->settings['move']);
                    break;
                case '-':
                    $this->turtle->rotate(-$this->settings['rotate']);
                    break;
                case '+':
                    $this->turtle->rotate($this->settings['rotate']);
                    break;
            }
        }
    }

    /**
     * @param $input
     */
    public function draw($input)
    {
        $inputArray = str_split($input);
        $this->turtle->set_color(mt_rand(20,255), mt_rand(20,255), mt_rand(20,255), 0);
        $this->turtle->goto($this->settings['startPosition'][0], $this->settings['startPosition'][1]);
        for ($i = 0; $i <= $this->settings['iterations']; $i++) {
            $this->operateTurtle($inputArray);
            $this->turtle->set_color(mt_rand(20,255), mt_rand(20,255), mt_rand(20,255), 10);
        }
    }
}
