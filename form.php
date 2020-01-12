<?php
// Set default settings
$settings =
    [
        'imageWidth' => 5700,
        'imageHeight' => 5700,
        'startPosition' => [2030, 2060],
        'iterations' => 100,
        'startInput' => 'X-Y-X+YY-XX+Y+X+Y',
        'rotate' => 22,
        'move' => 30,
        'rules' => [
            ['X','+YF-XFX-FY+'],
            ['Y','-YF+XFY-'],
            ['-X','+YF-XY+'],
            ['+Y','-YFX+FY-'],
        ]
    ];
?>
<html lang="en">
<head>
    <title>Generate images</title>
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<div class="wrapper">
    <form method="get" action="draw.php">
        <label>imageWidth: <input type="text" name="imageWidth" value="<?= $settings['imageWidth'] ?>"/></label>
        <label>imageHeight: <input type="text" name="imageHeight" value="<?= $settings['imageHeight'] ?>"/></label>
        <label>startPositionX: <input type="text" name="startPositionX"
                                      value="<?= $settings['startPosition'][0] ?>"/></label>
        <label>startPositionY: <input type="text" name="startPositionY"
                                      value="<?= $settings['startPosition'][1] ?>"/></label>
        <label>iterations: <input type="text" name="iterations" value="<?= $settings['iterations'] ?>"/></label>
        <label>startInput: <input type="text" name="startInput" value="<?= $settings['startInput'] ?>"/></label>
        <label>rotate: <input type="text" name="rotate" value="<?= $settings['rotate'] ?>"/></label>
        <label>move: <input type="text" name="move" value="<?= $settings['move'] ?>"/></label>
        <div style="display: block;">
            <label> Add rule:
                <input type="text" class="first-part" name="first_part">
                <input type="text" class="second-part" name="second_part">
            </label>
            <button type="button" class="add-button">add</button>
            <button type="button" class="refresh-button">refresh</button>
            <button type="button" class="update-button">update array from input</button>
        </div>

        <label>rules:
            <textarea class="rules" name="rules"><?= json_encode($settings['rules']) ?></textarea>
        </label>
        <input type="submit">
    </form>


</div>
<div class="rules-list"></div>

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    window.rulesJson = JSON.parse($('.rules').val());
</script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>