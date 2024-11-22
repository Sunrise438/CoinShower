<?php

$shortlinks = getShortlinks();
if ($shortlinks != 0){
    foreach ($shortlinks AS $row){
        require 'shortlinks_grid.php';
    }
} else {
    echo '<div class="alert alert-secondary">';
    echo '<strong>'.ucfirst($notAvilableShortlinksThisTimeName).'!</strong>';
    echo '</div>';
}