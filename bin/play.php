<?php
require_once "includes/functions.php";
if (! playersRegistered()) {
    header("Location: index.php");
}

if ($_POST['cell']) {
    $win = play($_POST['cell']);

    if ($win) {
        header("Location: result.php?player=" . getTurn());
    }
}

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
        $lastRow = 0;
        for ($i = 1; $i <= 9; $i++) {
            $row = ceil($i / 3);

            if ($row !== $lastRow) {
                $lastRow = $row;

                if ($i > 1) {
                    echo "</tr>";
                }

                echo "<tr class='row-{$row}'>";
            }

            $additionalClass = '';

            if ($i == 2 || $i == 8) {
                $additionalClass = 'vertical-border';
            }
            else if ($i == 4 || $i == 6) {
                $additionalClass = 'horizontal-border';
            }
            else if ($i == 5) {
                $additionalClass = 'center-border';
            }
            ?>

            <td class="cell-<?= $i ?> <?= $additionalClass ?>">
                <?php if (getCell($i) === 'x'): ?>
                    X
                <?php elseif (getCell($i) === 'o'): ?>
                    O
                <?php else: ?>
                    <input type="radio" name="cell" value="<?= $i ?>" onclick="enableButton()"/>
                <?php endif; ?>
            </td>

        <?php } ?>

        </tr>
        </tbody>
    </table>

    <button type="submit" disabled id="play-btn">Play</button>

</form>

<script type="text/javascript">
    function enableButton() {
        document.getElementById('play-btn').disabled = false;
    }
</script>

<?php
require_once "includes/footer.php";
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


