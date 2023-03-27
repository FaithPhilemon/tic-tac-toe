<?php
// micro functions for the game
session_start();
error_reporting(E_ERROR | E_PARSE);

function play() {
     // get the box selected and save to sessions
     for ($i=1; $i <= 9; $i++) { 
        if (isset($_POST["cell_$i"])){
            $_SESSION["cell_$i"] = "x";
            $userbox = $i;
        }
    }
    // system generates its own box and save to sessions
    $systembox = rand(1, 9);
    if($systembox != $userbox){
        $_SESSION["cell_$systembox"] = "o";
    }else{
        $systembox = rand(1, 9);
        $_SESSION["cell_$systembox"] = "o";
    }
    
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

function playsCount() {
    return $_SESSION['PLAYS'] ? $_SESSION['PLAYS'] : 0;
}

