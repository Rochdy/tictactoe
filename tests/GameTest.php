<?php

use Http\TictactoeApi;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    const BotUnit = 'O';
    CONST HumanUnit = 'X';
    private $winXBoard = [["X","X","X"],["O","O",""],["","",""]];
    private $winOBoard = [["O","O",""],["X","X","O"],["X","X","O"]];
    private $drawBoard = [["O","X","O"],["O","X","O"],["X","O","X"]];
    private $winXBoardHorizontalOne = [["X","X","X"],["O","","O"],["","",""]];
    private $winXBoardHorizontalTwo = [["O","","O"],["X","X","X"],["","",""]];
    private $winXBoardHorizontalThree = [["","",""],["O","","O"],["X","X","X"]];
    private $winXBoardVerticalOne = [["X","O","O"],["X","O",""],["X","",""]];
    private $winXBoardVerticalTwo = [["O","X",""],["","X",""],["O","X",""]];
    private $winXBoardVerticalThree = [["","","X"],["O","","X"],["","O","X"]];
    private $winXBoardCrossOne = [["X","",""],["","X","O"],["","O","X"]];
    private $winXBoardCrossTwo = [["O","","X"],["O","X",""],["X","",""]];
    private $oneEmptyCellBoard = [["O","X","O"],["O","X","O"],["X","O",""]];

    public function testBotChooseEmptyCell()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->oneEmptyCellBoard)]))->play();
        $board = $game['board'];
        $this->assertIsArray($board);
        $this->assertEquals(self::BotUnit,$board[2][2]);
    }

    public function testBotCanWin()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winOBoard)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::BotUnit,$game['winner']);
    }

    public function testHumanCanWin()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoard)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }

    public function testGameCanFinishedWithAdraw()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->drawBoard)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('draw',$game['status']);
    }

    public function testHumanCanWinHorizontalOne()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoardHorizontalOne)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }

    public function testHumanCanWinHorizontalTwo()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoardHorizontalTwo)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }

    public function testHumanCanWinHorizontalThree()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoardHorizontalThree)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }

    public function testHumanCanWinVerticalOne()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoardVerticalOne)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }

    public function testHumanCanWinVerticalTwo()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoardVerticalTwo)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }

    public function testHumanCanWinVerticalThree()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoardVerticalThree)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }

    public function testHumanCanWinCrossOne()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoardCrossOne)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }

    public function testHumanCanWinCrossTwo()
    {
        $game = (new TictactoeApi(['board' => json_encode($this->winXBoardCrossTwo)]))->play();
        $this->assertIsArray($game['board']);
        $this->assertEquals('win',$game['status']);
        $this->assertEquals(self::HumanUnit,$game['winner']);
    }
}