<?php
// Do not edit the next line
require_once "functions.php";

// the if statement below checks if data has been posted from the form
if (isset($_POST["submit"])){
    // TODO: call the play function here and assign it to a variable called $winner_message
    $winner_message = play();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
        <title>Simple TicTacToe Game</title>

        <link rel='stylesheet' href='style.css' type='text/css'/>
    </head>
    <body>
        <div class="wrapper">
            <h1>Play Tic Tac Toe!</h1>
            <h3>You're Player 'X' while the system is Player 'Y'</h3>
            <?php if(isset($winner_message)){ echo $winner_message; }?>

            <form method="post" action="index.php">

                <table class="tic-tac-toe" cellpadding="0" cellspacing="0">
                    <tbody>
                    <?php 
                        /* TODO: Use for-loop to generate the rows and columns of the table below in the following tips:

                            1. Use the cell postions to determine where to call the vertical-border, horizontal-border and
                                center-border CSS classes to produce the grid lines.

                            2. Use the getCell() function to determine a marked box so you can display x or an o mark
                            depending on which of the players marked the cell. Display the form input when the cell is unmarked.


                        */
                        $cell_count = 1;
                        for ($row=1; $row <= 3; $row++) {

                            echo "<tr class='row-$row'>";
                                for ($cell=1; $cell <= 3; $cell++) {

                                    $additional_class = '';
                                    if ($cell_count == 2 || $cell_count == 8) {
                                        $additional_class = 'vertical-border';
                                    }else if ($cell_count == 4 || $cell_count == 6) {
                                        $additional_class = 'horizontal-border';
                                    }else if ($cell_count == 5) {
                                        $additional_class = 'center-border';
                                    }

                                    echo "<td class='cell-$cell_count $additional_class'>";

                                        if (getCell($cell_count) == 'x'){
                                            echo "X";
                                        }elseif (getCell($cell_count) == 'o'){
                                            echo "O";
                                        }else{
                                            echo "<input type='radio'  name='cell_$cell_count' value='$cell_count'>";
                                        }
                                        $cell_count++;
                                }
                            echo '</td></tr>';           
                    }
                    ?>
                    </tbody>
                </table>

                <?php 
                    /* the following if statement will check if a winner has been found
                        DO NOT EDIT;
                    */
                    if($winner_message != ''){
                        resetBoard();
                        echo '<a href="index.php" style="color: #ff3111; font-weight: bold">Play Again</a>';
                    }else{
                        echo('<button type="submit" name="submit" id="go">Next Move</button>');
                    }
                ?>

            </form>
        </div>
    </body>
</html>
