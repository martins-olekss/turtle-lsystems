<?

// This file can be distributed under GPLv3 or any other OSI approved licence.
// I (Piotr Sobolewski) am author of it, but I'm not going to actively develope
// it. If you'd like to improve it, feel free to take it over.

class Image {
	public $gd_image;
	function __construct($width, $height, $r = 255, $g = 255, $b = 255) {
		$image = imagecreatetruecolor($width, $height);
		$color = imagecolorallocate($image, $r, $g, $b);
		imagefill($image, 0, 0, $color);
		$this->gd_image = $image;
	}
	function send_gif($send_header = true) {
		if ($send_header) header("Content-type: image/gif");
		imagegif($this->gd_image);
	}
}

class Turtle {
	protected $x = 0;
	protected $y = 0;
	protected $direction = 0;
	protected $pen_down = true;
	protected $gd_image;
	protected $color;
	public $font = 'FreeMono.ttf';
	function __construct($image) {
		$this->gd_image = $image->gd_image;
		$this->color = imagecolorallocate($this->gd_image, 0, 0, 0);
		putenv('GDFONTPATH=' . realpath('.'));
	}
	function move($distance) {
		$dx = $distance * sin(deg2rad($this->direction));
		$dy = $distance * cos(deg2rad($this->direction));
		if (abs($dx)<0.001) $dx = 0;
		if (abs($dy)<0.001) $dy = 0;
		if ($this->pen_down) {
			imageline(
				$this->gd_image,
				$this->x,
				$this->y,
				$this->x + $dx,
				$this->y + $dy,
				$this->color
			);
		}
		$this->x = $this->x + $dx;
		$this->y = $this->y + $dy;
	}
	function write($text, $size=20) {
		imagettftext(
			$this->gd_image, 
			$size, 
			($this->direction)-90, 
			$this->x, 
			$this->y, 
			$this->color, 
			$this->font,
			$text
		);
	}
	function goto($x, $y) {
		$this->x = $x;
		$this->y = $y;
	}
	function rotate($rotation) {
		$this->direction += $rotation;
		if ($this->direction >= 360) {
			$this->direction -= 360;
		}
	}
	function set_color($r, $g, $b, $a) {
		$this->color = imagecolorallocatealpha($this->gd_image, $r, $g, $b, $a);
	}
	function pen_up() {
		$this->pen_down = false;
	}
	function pen_down() {
		$this->pen_down = true;
	}
	function pen_toggle() {
		$this->pen_down = ! $this->pen_down;;
	}
}

?>
