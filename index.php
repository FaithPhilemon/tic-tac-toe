<?php
require_once "includes/functions.php";

if (! playersRegistered()) {
    header("Location: index.php");
}

if (isset($_POST["submit"])){
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
			$winner = 'x';
			$winner_message = "<h2>X Wins!</h2>";

		}elseif(($_SESSION["cell_1"] == 'o' && $_SESSION["cell_2"] == 'o' && $_SESSION["cell_3"] == 'o')  || ($_SESSION["cell_4"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_6"] == 'o') || ($_SESSION["cell_7"] == 'o' && $_SESSION["cell_8"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_1"] == 'o' && $_SESSION["cell_4"] == 'o' && $_SESSION["cell_7"] == 'o')  || ($_SESSION["cell_2"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_8"] == 'o') || ($_SESSION["cell_3"] == 'o' && $_SESSION["cell_6"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_1"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_9"] == 'o') || ($_SESSION["cell_3"] == 'o' && $_SESSION["cell_5"] == 'o' && $_SESSION["cell_7"] == 'o')){
            $winner = 'o';
            $winner_message = "<h2>O Wins!</h2>";
		}
}

?>

<?php require_once "includes/header.php"; ?>

<h1>Play Tic Tac Toe!</h1>
<h3>You're Player 'X' while the system is Player 'Y'</h3>
<?php if(isset($winner_message)){ echo $winner_message; }?>

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

        if($winner != ''){
            resetBoard();
            echo '<a href="play.php" style="color: #ff3111; font-weight: bold">Play Again</a>';
        }else{
            echo('<button type="submit" name="submit" id="go">Next Move</button>');
        }
    ?>

</form>

<?php require_once "includes/footer.php"; ?>
