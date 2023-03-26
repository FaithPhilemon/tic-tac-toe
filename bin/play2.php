<?php

for ($i=1; $i <= 9; $i++) { 
    $_SESSION["cell_$i"] = '';
}

// $_SESSION['plays'];
// exit(print_r($_SESSION));
if (isset($_POST["submit"])){
        // get the box selected and save to sessions
        // exit(print_r($_POST));

        for ($i=1; $i <= 9; $i++) { 
            if (isset($_POST["cell_$i"])){
                $_SESSION["cell_$i"] = "x";
                $userbox = $i;
            }
        }
        // $_SESSION['plays']++;

        // system generates its own box and save to sessions
        $systembox = rand(1, 9);
        if($systembox != $userbox){
            $_SESSION["cell_$systembox"] = "o";
        }else{
            $systembox = rand(1, 9);
            $_SESSION["cell_$systembox"] = "o";
        }
        // $_SESSION['plays']++;

        // exit(print_r($_SESSION));
        // echo ("We got here...");
		if(($_SESSION["cell_1"] == 'x' && $_SESSION["cell_2"] == 'x' && $_SESSION["cell_3"] == 'x')  || ($_SESSION["cell_4"] == 'x' && $_SESSION["cell_5"] == 'x' && $_SESSION["cell_6"] == 'x') || ($_SESSION["cell_7"] == 'x' && $_SESSION["cell_8"] == 'x' && $_SESSION["cell_9"] == 'x') || ($_SESSION["cell_1"] == 'x' && $_SESSION["cell_4"] == 'x' && $_SESSION["cell_7"] == 'x')  || ($_SESSION["cell_2"] == 'x' && $_SESSION["cell_5"] == 'x' && $_SESSION["cell_8"] == 'x') || ($_SESSION["cell_3"] == 'x' && $_SESSION["cell_6"] == 'x' && $_SESSION["cell_9"] == 'x') || ($_SESSION["cell_1"] == 'x' && $_SESSION["cell_5"] == 'x' && $_SESSION["cell_9"] == 'x') || ($_SESSION["cell_3"] == 'x' && $_SESSION["cell_5"] == 'x' && $_SESSION["cell_7"] == 'x')){
			$winner = 'x';
			Print "<h1>X Wins!</h1>";
            // resetBoard();
            echo "XXXX";

		}elseif(($_SESSION["cell_1"] == 'o' && $_SESSION["cell_2"] == 'o' && $_SESSION["cell_3"] == 'o')  || ($_SESSION["cell_4"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_6"] == 'o') || ($_SESSION["cell_7"] == 'o' && $_SESSION["cell_8"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_1"] == 'o' && $_SESSION["cell_4"] == 'o' && $_SESSION["cell_7"] == 'o')  || ($_SESSION["cell_2"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_8"] == 'o') || ($_SESSION["cell_3"] == 'o' && $_SESSION["cell_6"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_1"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_3"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_7"] == 'o')){
            $winner = 'o';
            Print "<h1>O Wins!</h1>";
            // resetBoard();
            echo "OOOO";
		}
}



// redirect to result page if number of plays is equal to or greater than 9
// if ($_SESSION['plays'] >= 9) {
//     header("Location: result.php");
// }


// echo("We got here...");
// exit(print_r($_SESSION));
?>

<?php require_once "includes/header.php"; ?>

<h2>Play Tic-Tac-Toe</h2>

<form method="post" action="play.php">

    <table class="tic-tac-toe" cellpadding="0" cellspacing="0">
        <tbody>
        <?php 
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
                                echo "<input type='radio'  name='cell_$cell_count' value='cell_$cell_count'>";
                            }
                            $cell_count++;
                    }
                echo '</td></tr>';           
          }
        ?>

            <!-- <tr class='row-1'>
                <td class="cell-1 ">
                    <input type="radio" name="cell" value="1" onclick="enableButton()"/>
                </td>
            
                <td class="cell-2 vertical-border">
                        <input type="radio" name="cell" value="2" onclick="enableButton()"/>
                </td>
            
                <td class="cell-3 ">
                    <input type="radio" name="cell" value="3" onclick="enableButton()"/>
                </td>

            </tr>
            
            <tr class='row-2'>
                <td class="cell-4 horizontal-border">
                        <input type="radio" name="cell" value="4" onclick="enableButton()"/>
                </td>

                <td class="cell-5 center-border">
                    <input type="radio" name="cell" value="5" onclick="enableButton()"/>
                </td>
            
                <td class="cell-6 horizontal-border">
                    <input type="radio" name="cell" value="6" onclick="enableButton()"/>
                </td>

            </tr>
            
            <tr class='row-3'>
                <td class="cell-7 ">
                    <input type="radio" name="cell" value="7" onclick="enableButton()"/>
                </td>
            
                <td class="cell-8 vertical-border">
                    <input type="radio" name="cell" value="8" onclick="enableButton()"/>
                </td>
            
                <td class="cell-9 ">
                    <input type="radio" name="cell" value="9" onclick="enableButton()"/>
                </td>
            </tr> -->
        </tbody>
    </table>

    <!-- <button type="submit" disabled id="play-btn">Play</button> -->

    <?php 

        if($winner != ''){
            print('<input type = "button" name = "newgamebtn" value = "Play Again" id = "go" onclick = "window.location.href=\'index.php\'">');
            // <button type="submit" disabled id="play-btn">Play</button>
        }else{
            print('<button type="submit" name="submit" id="go">Next Move</button>');
        }
    ?>

</form>

<?php require_once "includes/footer.php"; ?>
