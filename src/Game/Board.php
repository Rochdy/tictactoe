<?php

namespace Game;

class Board
{
    /** @var array */
    private $board;

    /**
     * Board constructor.
     * @param $board
     */
    public function __construct($board)
    {
        $this->board = $board;
    }

    /**
     * Generate a flat array of the board ex [0,1,2,3,4,5,6,7,8]
     * @return array
     */
    public function getReadableBoard()
    {
        $flatBoard = [];
        foreach ($this->board as $key => $row) {
            foreach ($row as $index => $cell) {
                $flatBoard[$key*3+$index] = $cell;
            }
        }
        return $flatBoard;
    }

    /**
     * @return bool
     */
    public function isFull()
    {
        foreach ($this->getReadableBoard() as $cell){
            if(empty($cell)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return bool|mixed
     */
    public function getFreePosition()
    {
        $freePos = [];
        foreach ($this->board as $key => $row) {
            foreach ($row as $index => $cell) {
                if (empty($cell)) {
                    $freePos[] = [$key, $index];
                }
            }
        }
        if(count($freePos) == 0){
            return false;
        }
        return $freePos[array_rand($freePos)];
    }

    /**
     * @param $x
     * @param $y
     * @param $unit
     * @return array
     */
    public function updateCell($x, $y, $unit)
    {
        $this->board[$x][$y] = $unit;
        return [
            $x,
            $y,
            $unit
        ];
    }

    /**
     * @return array
     */
    public function getBoard()
    {
        return $this->board;
    }
}