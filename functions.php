<?php
// micro functions for the game
session_start();
error_reporting(E_ERROR | E_PARSE);

function play() {
    /*  The purpose of this function is to execute the game-play which should happen in the following steps:

        1. The player makes the first move by selecting one of the nine boxes from the grid, 
        so you'll need to get the box marked by the player, create a session variable and 
        assign the value of the player to it. This has been achieved for you.
      
        2. The system makes the next move by selecting its own box from the grid, and just like in step 1.
         we'll need to save it in a session variable and assign the value of the system player to it.

        3. Check if any of the two players have successfully marked 3 cells (boxes) in the grid vertically, 
        horizontally or diagonally which will mean a win for the player, in that case we'll need to return
        a win message that could be printed.
     
        Inside the following for-loop, we're using the isset() function to check if data has been posted
        from the form (this will be the player's marking of a box in the grid)
    

        STEP 1: Player's turn
        lets check all the 9 cells in the grid
    */

     for ($i=1; $i <= 9; $i++) { 

        /* if any of the 9 cells isset(), then we know it's the marked box, so we'll need to create a 
         session variable and save "x (the player)" in it; Note that "x" represents the player. */
        if (isset($_POST["cell_$i"])){
            $_SESSION["cell_$i"] = "x";
            $user_cell = $i;
        }
    }



    /* STEP 2: System's turn
        Now lets get the system to make its own move
         TODO: 
         1. Generate a random number between 1 to 9 using the rand() function, the number generated will 
         represent the box marked by the system. Store it in a variable called $system_cell

         2. Use for-loop to check if the generated number matches a previously marked box (either by the
         system or player). If the number generated is previously marked, generate another one and repeat
         the process, else create a session variable out of the cell number and store "o" inside it. Note that
         "o" represents the system.

         NOTE: The session variable must be prefixed with "cell_" then the variable $system_cell 
         Here's an example:
         $_SESSION["cell_$system_cell"] = "o";
    */ 

    $system_cell = rand(1, 9);
    for ($i=1; $i <= 9; $i++) { 
        if($system_cell != $user_cell){
            $_SESSION["cell_$system_cell"] = "o";
            break;
        }else{
            $system_cell = rand(1, 9);
            $_SESSION["cell_$system_cell"] = "o";
            break;
        }
    }
    
    
    /*
    STEP 3: Check and display winner (if any)
    Here are the 8 winning combinations;

    Cell 1, 2, 3 = horizontal win
    Cell 4, 5, 6 = horizontal win
    Cell 7, 8, 9 = horizontal win

    Cell 1, 4, 7 = vertical win
    Cell 2, 5, 8 = vertical win
    Cell 3, 6, 9 = vertical win

    Cell 1, 5, 9 = diagonal win
    Cell 3, 5, 7 = diagonal win

    TODO: Rerencing the above winning combinations, use an if-elseif statement to check if any of the players
    has played a win or not yet.

    if the player wins, return "<h2 style='color: #ff3111;'>X Wins!</h2>";

    if the system wins, return "<h2 style='color: #ff3111;'>O Wins!</h2>";
    */
    if(($_SESSION["cell_1"] == 'x' && $_SESSION["cell_2"] == 'x' && $_SESSION["cell_3"] == 'x')  || ($_SESSION["cell_4"] == 'x' && $_SESSION["cell_5"] == 'x' && $_SESSION["cell_6"] == 'x') || ($_SESSION["cell_7"] == 'x' && $_SESSION["cell_8"] == 'x' && $_SESSION["cell_9"] == 'x') || ($_SESSION["cell_1"] == 'x' && $_SESSION["cell_4"] == 'x' && $_SESSION["cell_7"] == 'x')  || ($_SESSION["cell_2"] == 'x' && $_SESSION["cell_5"] == 'x' && $_SESSION["cell_8"] == 'x') || ($_SESSION["cell_3"] == 'x' && $_SESSION["cell_6"] == 'x' && $_SESSION["cell_9"] == 'x') || ($_SESSION["cell_1"] == 'x' && $_SESSION["cell_5"] == 'x' && $_SESSION["cell_9"] == 'x') || ($_SESSION["cell_3"] == 'x' && $_SESSION["cell_5"] == 'x' && $_SESSION["cell_7"] == 'x')){
        return "<h2 style='color: #ff3111;'>X Wins!</h2>";

    }elseif(($_SESSION["cell_1"] == 'o' && $_SESSION["cell_2"] == 'o' && $_SESSION["cell_3"] == 'o')  || ($_SESSION["cell_4"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_6"] == 'o') || ($_SESSION["cell_7"] == 'o' && $_SESSION["cell_8"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_1"] == 'o' && $_SESSION["cell_4"] == 'o' && $_SESSION["cell_7"] == 'o')  || ($_SESSION["cell_2"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_8"] == 'o') || ($_SESSION["cell_3"] == 'o' && $_SESSION["cell_6"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_1"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_3"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_7"] == 'o')){
        return "<h2 style='color: #ff3111;'>O Wins!</h2>";
    }
}

function getCell($cell='') {
    return $_SESSION['cell_' . $cell];
}

function resetBoard() {
    for ( $i = 1; $i <= 9; $i++ ) {
        unset($_SESSION['cell_' . $i]);
    }
}


