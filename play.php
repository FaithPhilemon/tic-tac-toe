<?php
// Include functions
require_once "includes/functions.php";

// redirect to play page if players are registered
if (! playersRegistered()) {
    header("location: index.php");
}

// send a "box selection" to play function
if ($_POST['cell']) {
    $win = play($_POST['cell']);

    if ($win) {
        header("Location: result.php?player=" . getTurn());
    }
}

// redirect to result page if number of plays is equal to or greater than 9
if (playsCount() >= 9) {
    header("Location: result.php");
}
?>

<?php require_once "includes/header.php"; ?>

<h2><?php echo currentPlayer() ?>'s turn</h2>

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

                        echo "<td class='cell-$cell_count $additional_class'>
                                <input type='radio'  name='cell' value='$cell_count' onclick='enableButton()'>
                            </td>";
                            $cell_count++;
                    }
                echo '</tr>';


                
               
          } ?>

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

    <button type="submit" disabled id="play-btn">Play</button>

</form>

<script type="text/javascript">
    function enableButton() {
        document.getElementById('play-btn').disabled = false;
    }
</script>

<?php require_once "includes/footer.php"; ?>
