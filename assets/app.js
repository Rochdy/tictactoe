let board = [["","",""],["","",""],["","",""]];
const humanUnit = 'X';
const botUnit = 'O';

function clickedCell(cell){
    let cellYX = cell.dataset.cell.split(",");
    updateBoard(cellYX[1],cellYX[0],humanUnit)
    $.ajax({
        type: "POST",
        url: './play.php',
        data: {
            board: JSON.stringify(board)
        },
        success: function(data){
            switch (data.status) {
                case 'win':
                    endGame(`${data.winner} WON!`);
                    break;
                case 'draw':
                    endGame(`DRAW!`);
                    break;
                default:
                    updateBoard(data.next_move[1], data.next_move[0],botUnit);
            }
            if(data.last_move){
                updateBoard(data.last_move[0], data.last_move[1],botUnit);
            }
        }
    });
}

function updateBoard(x,y,unit) {
    board[y][x] = unit;
    cell = document.querySelector(`[data-cell="${y},${x}"]`)
    cell.innerHTML = unit;
    cell.removeAttribute("onclick");
}

function endGame(text) {
    $('#status').text(text);
    $('td').each( function (el) {
        $(this).prop("onClick", null)
    });
    $('#reset').css('opacity', '1');
}

function resetBoard(){
    $('#reset').css('opacity', '0');
    board = board.map(function(x){
        return x.map((y => ""));
    });
    $('td').each( function (el) {
        $(this).text("");
        $(this).attr('onClick', 'clickedCell(this)');
    });
    $('#status').text("");
}