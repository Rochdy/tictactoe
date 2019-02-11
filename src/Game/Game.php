<?php

namespace Game;

class Game
{
    CONST WIN_CONDITIONS = [
        [0,1,2],
        [3,4,5],
        [6,7,8],
        [0,3,6],
        [1,4,7],
        [2,5,8],
        [0,4,8],
        [6,4,2]
    ];
    CONST WIN = 1;
    CONST DRAW = 2;
    CONST UN_FINISHED = 3;
    protected $board;
    protected $winner;

    /**
     * Board constructor.
     * @param $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    /**
     * @return bool
     */
    public function IsWon()
    {
        $readableBoard = $this->board->getReadableBoard();
        foreach (self::WIN_CONDITIONS as $i=>$condition){
            if(($readableBoard[$condition[0]] == $readableBoard[$condition[1]]) && ($readableBoard[$condition[1]] == $readableBoard[$condition[2]]) && !empty($readableBoard[$condition[1]])){
                $this->winner = $readableBoard[$condition[1]];
                break;
            }
        }
        return $this->winner ? true : false;
    }

    /**
     * @return bool
     */
    public function IsDraw()
    {
        return !$this->winner && $this->board->isFull();
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {

        if($this->IsWon()) {
            return [
                'status' => self::WIN,
                'winner' => $this->winner,
                'board' => $this->board->getBoard()
            ];
        } elseif ($this->IsDraw()){
            return [
                'status' => self::DRAW,
                'board' => $this->board->getBoard()
            ];
        }
        return [
            'status' => self::UN_FINISHED,
            'board' => $this->board->getBoard()
        ];
    }
}