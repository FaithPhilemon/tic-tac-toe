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

<h2><?php echo currentPlayer() ?>'s Turn</h2>

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
            
        <?php }} ?>
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
