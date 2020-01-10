<?php
// Set default settings
$settings =
    [
        'imageWidth' => 5700,
        'imageHeight' => 5700,
        'startPosition' => [2030, 2060],
        'iterations' => 20,
        'startInput' => 'X',
        'rotate' => 90,
        'move' => 30,
        'rules' => [
            ['X','+YF-XFX-FY+'],
            ['Y','-YF+XFX+FY-']
        ]
    ];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Generate images</title>
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <div class="wrapper">
        <form method="get" action="draw.php">
            <label>imageWidth: <input type="text" name="imageWidth" value="<?= $settings['imageWidth'] ?>"/></label>
            <label>imageHeight: <input type="text" name="imageHeight" value="<?= $settings['imageHeight'] ?>"/></label>
            <label>startPositionX: <input type="text" name="startPositionX" value="<?= $settings['startPosition'][0] ?>"/></label>
            <label>startPositionY: <input type="text" name="startPositionY" value="<?= $settings['startPosition'][1] ?>"/></label>
            <label>iterations: <input type="text" name="iterations" value="<?= $settings['iterations'] ?>"/></label>
            <label>startInput: <input type="text" name="startInput" value="<?= $settings['startInput'] ?>" /></label>
            <label>rotate: <input type="text" name="rotate" value="<?= $settings['rotate'] ?>"/></label>
            <label>move: <input type="text" name="move" value="<?= $settings['move'] ?>"/></label>
            <label>rules:
                <textarea name="rules"><?= json_encode($settings['rules']) ?></textarea>
            </label>
            <input type="submit">
        </form>
    </div>
</body>
</html>