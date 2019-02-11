<?php

namespace Http;

use Http\Exceptions\DrawException;
use Http\Exceptions\WinException;
use Game\Board;
use Game\Bot;
use Game\Game;
use Game\Human;

class TictactoeApi implements MoveInterface
{
    protected $game;
    protected $board;
    protected $bot;
    protected $status;

    public function __construct($data)
    {
        $board = json_decode($data['board']);
        $this->board = new Board($board);
        $this->game = new Game($this->board);
        $this->bot = new Bot();
    }

    /**
     * @param $playerUnit
     * @return bool
     * @throws DrawException
     * @throws WinException
     */
    public function rateMove($playerUnit)
    {
        $gameStatus = $this->game->getStatus();
        switch ($gameStatus['status']) {
            case Game::WIN:
                throw new WinException($playerUnit);
                break;
            case Game::DRAW:
                throw new DrawException();
                break;
            default:
                return false;
        }
    }

    /**
     * @return array
     */
    public function play()
    {
        try {
            $this->rateMove(Human::SIGN);
            $botMove = $this->makeMove($this->board->getBoard());
            $this->board->updateCell($botMove[1], $botMove[0], $botMove[2]);
            $this->rateMove(Bot::SIGN);
        } catch (WinException $e) {
            return [
                'status' => 'win',
                'winner' => $e->getMessage(),
                'board' => $this->board->getBoard(),
                'last_move' => $this->bot->getLastMove()
            ];
        } catch (DrawException $e){
            return [
                'status' => 'draw',
                'board' => $this->board->getBoard(),
                'last_move' => $this->bot->getLastMove()
            ];
        }
        return [
            'status' => 'not_finished',
            'board' => $this->board->getBoard(),
            'next_move' => [$botMove[1],$botMove[0]],
            'player' => Bot::SIGN,
            'last_move' => $this->bot->getLastMove()
        ];
    }

    /**
     * @param array $boardState
     * @param string $playerUnit
     * @return array
     */
    public function makeMove($boardState, $playerUnit = 'X')
    {
        $nextMove = $this->bot->getNextMove($this->board);
        return $nextMove;
    }
}