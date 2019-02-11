<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic Tac Toe | M.Roshdy</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Tic Tac Toe</h1>
    <h1 id="status"></h1>
    <button id="reset" onclick="resetBoard()">Play Again?</button>
    <table>
        <?php foreach ([0,1,2] as $row): ?>
        <tr>
            <?php foreach ([0,1,2] as $cell): ?>
                <td class="<?php echo ($cell == 1) ? 'vert':''; echo ($row == 1) ? ' hori':'';?>" onclick="clickedCell(this)" data-cell="<?php echo "{$row},{$cell}"?>"></td>
            <?php endforeach;?>
        <tr>
            <?php endforeach;?>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/app.js"></script>
</body>
</html>