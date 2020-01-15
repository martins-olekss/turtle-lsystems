<?php

namespace TurtleDraw;

class Image
{
    public $image;
    const HEADER_GIF = 'Content-type: image/gif';
    const HEADER_PNG = 'Content-type: image/png';
    const HEADER_WEBP = 'Content-type: image/webp';

    public function __construct($width, $height, array $rgb = [255,255,255])
    {
        $image = imagecreatetruecolor($width, $height);
        $color = imagecolorallocate($image, $rgb[0], $rgb[1], $rgb[2]);
        imagefill($image, 0, 0, $color);
        $this->image = $image;
    }

    /**
     * @param bool $sendHeader
     */
    public function gif($sendHeader = true)
    {
        if ($sendHeader) header(self::HEADER_GIF);
        imagegif($this->image);
    }

    /**
     * @param bool $sendHeader
     * @param null $fileName
     */
    public function png($sendHeader = true, $fileName = null)
    {
        if ($sendHeader) header(self::HEADER_PNG);
        imagepng($this->image, $fileName);
    }

    /**
     * @param bool $sendHeader
     */
    public function webp($sendHeader = true)
    {
        if ($sendHeader) header(self::HEADER_WEBP);
        imagewebp($this->image);
    }
}