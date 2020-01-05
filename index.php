<?php 

$row = 0;
$pion = 0;

require_once './inc/controls.php';
require_once './inc/functions.php';
playerInc();
resetGame();
?> 
<div class="container">
    <?php
    playerTurnCounter();
    board();
    ?>
</div>

<?php
