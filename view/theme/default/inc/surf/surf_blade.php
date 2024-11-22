<?php
$surf = getSurf();

if ($surf != 0){
    foreach ($surf AS $row){
        require __DIR__.'/surf_grid.php';
    }
}else{
    echo '<div class="alert alert-secondary">';
    echo '<strong>'.ucfirst($notAvilableSurfThisTimeName).'!</strong>';
    echo '</div>';
}

?>
<script src="ctrl/surf/surf/js/js.js"></script>