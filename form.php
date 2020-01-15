<?php
// Set default settings
$settings =
    [
        'imageWidth' => 1700,
        'imageHeight' => 1700,
        'startPosition' => [1630, 1600],
        'iterations' => 100,
        'startInput' => 'X-Y-X+YY-XX+Y+X+Y',
        'rotate' => 22,
        'move' => 30,
        'rules' => [
            ['X', '+YF-XFX-FY+'],
            ['Y', '-YF+XFY-'],
            ['-X', '+YF-XY+'],
            ['+Y', '-YFX+FY-'],
        ]
    ];
?>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <title>Generate images</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/dark.min.css">
</head>
<body>

<div id="app">
    <form method="get" action="draw.php">
        <label>width, height:
            <input type="text" name="imageWidth" value="<?= $settings['imageWidth'] ?>"/>
            <input type="text" name="imageHeight" value="<?= $settings['imageHeight'] ?>"/>
        </label>
        <label>drawing start x, y: <input type="text" name="startPositionX"
                                          value="<?= $settings['startPosition'][0] ?>"/>
            <input type="text" name="startPositionY" value="<?= $settings['startPosition'][1] ?>"/>
        </label>
        <label>iterations:
            <input type="text" name="iterations" value="<?= $settings['iterations'] ?>"/>
        </label>
        <label>startInput:
            <input type="text" name="startInput" value="<?= $settings['startInput'] ?>"/>
        </label>
        <label>rotate:
            <input type="text" name="rotate" value="<?= $settings['rotate'] ?>"/>
        </label>
        <label>move:
            <input type="text" name="move" value="<?= $settings['move'] ?>"/>
        </label>
        <table>
            <tr>
                <th>id</th>
                <th>subject</th>
                <th>replacement</th>
                <th>action</th>
            </tr>
            <tr class="new-rule">
                <td></td>
                <td><input type="text" v-model="newObject" value="1" title=""/></td>
                <td><input type="text" v-model="newReplacement" value="2" title=""/></td>
                <td>
                    <button type="button" v-on:click="add(newObject, newReplacement)">add</button>
                </td>
            </tr>
            <tr v-for="(item, index) in settings.rules">
                <td>{{ index }}</td>
                <td><input v-model="settings.rules[index][0]" type="text" title=""/></td>
                <td><input v-model="settings.rules[index][1]" type="text" title=""/></td>
                <td>
                    <button type="button" v-on:click="remove(index)">remove</button>
                </td>
            </tr>
        </table>
        <textarea style="display: none" class="rules" name="rules" title="draw rules">{{ settings.rules }}</textarea>
        <input type="submit" class="submit" name="submitSettings" value="Start drawing process">
    </form>
    <button type="button" class="submit" v-on:click="submitToDraw()">Draw & Show</button>
    <img :src="responseData"/>
</div>


<script type="text/javascript" src="js/vue.min.js"></script>
<script type="text/javascript">
    new Vue({
        el: '#app',
        data: {
            settings: <?= json_encode($settings) ?>,
            newObject: '',
            newReplacement: '',
            response: '',
            items: '',
            responseData: ''
        },
        methods: {
            remove: function (id) {
                this.settings.rules.splice(id, 1);
            },
            add: function (object, replacement) {
                this.settings.rules.push([object, replacement]);
            },
            submitToDraw: function () {
                fetch('/draw.php',
                    {
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        method: 'POST',
                        body: JSON.stringify(this.settings)
                    })
                    .then(response => response.blob())
                    .then(images => {
                        this.responseData = URL.createObjectURL(images);
                    })
                    .catch(error => console.error(error));
            }
        }
    });
</script>
</body>
</html>