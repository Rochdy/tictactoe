<?php

require_once __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticTacToe = (new \Http\TictactoeApi($_POST))->play();
    Http\Response::send($ticTacToe);
}
return;