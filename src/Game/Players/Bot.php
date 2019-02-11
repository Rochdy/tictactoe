<?php

namespace Game;

class Bot
{
    CONST SIGN = 'O';
    protected $lastMove;

    /**
     * @param Board $board
     * @return array
     */
    public function getNextMove(Board $board)
    {
        $move = $board->getFreePosition();
        $this->lastMove = [$move[1], $move[0]];
        return [
            $move[1],
            $move[0],
            self::SIGN
        ];
    }

    /**
     * @return mixed
     */
    public function getLastMove()
    {
        return $this->lastMove;
    }
}