<?php

namespace TurtleDraw;

class Turtle
{
    protected $x = 0;
    protected $y = 0;
    protected $direction = 0;
    protected $penDown = true;
    protected $image;
    protected $color;
    public $font = 'FreeMono.ttf';

    public function __construct($image)
    {
        $this->image = $image->image;
        $this->color = imagecolorallocate($this->image, 0, 0, 0);
    }

    /**
     * @param $distance
     * @return $this
     */
    public function move($distance)
    {
        $dx = $distance * sin(deg2rad($this->direction));
        $dy = $distance * cos(deg2rad($this->direction));
        if (abs($dx) < 0.001) $dx = 0;
        if (abs($dy) < 0.001) $dy = 0;
        if ($this->penDown) {
            imageline(
                $this->image,
                $this->x,
                $this->y,
                $this->x + $dx,
                $this->y + $dy,
                $this->color
            );
        }
        $this->x = $this->x + $dx;
        $this->y = $this->y + $dy;

        return $this;
    }

    /**
     * @param $text
     * @param int $size
     * @return $this
     */
    public function write($text, $size = 20)
    {
        imagettftext(
            $this->image,
            $size,
            ($this->direction) - 90,
            $this->x,
            $this->y,
            $this->color,
            $this->font,
            $text
        );

        return $this;
    }

    /**
     * @param $x
     * @param $y
     * @return $this
     */
    public function setPen($x, $y)
    {
        $this->x = $x;
        $this->y = $y;

        return $this;
    }

    /**
     * @param $rotation
     * @return $this
     */
    public function rotate($rotation)
    {
        $this->direction += $rotation;
        if ($this->direction >= 360) {
            $this->direction -= 360;
        }

        return $this;
    }

    public function rotateLeft($rotation) {}
    public function rotateRight($rotation) {}

    /**
     * @param array $rgba
     * @return $this
     */
    public function setColor(array $rgba)
    {
        $this->color = imagecolorallocatealpha($this->image, $rgba[0], $rgba[1], $rgba[2], $rgba[3]);

        return $this;
    }

    /**
     * @return $this
     */
    public function penUp()
    {
        $this->penDown = false;

        return $this;
    }

    /**
     * @return $this
     */
    public function penDown()
    {
        $this->penDown = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function penToggle()
    {
        $this->penDown = !$this->penDown;

        return $this;
    }
}