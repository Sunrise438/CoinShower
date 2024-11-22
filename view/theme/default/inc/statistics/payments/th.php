<?php

if (isset($_GET['t'])){
    if (isset($_GET['token'])){
        $t = 't='.$_GET['t'].'&token='.$_GET['token'].'&';
    } else {
        $t = 't='.$_GET['t'].'&';
    }
    
} else {
    $t = '';
}

/*
 * set order type
 */
if (isset($_GET['q'])){
    if ($_GET['q'] == 'asc'){
        $q = 'desc';
    } else {
        $q = 'asc';
    }
} else {
    $q = 'desc';
}

echo '<thead>';
echo '<tr>';
echo '<th>'. ucfirst($idName).'</th>';
echo '<th>'. ucfirst($dateName).'</th>';
echo '<th>'. ucfirst($infoName).'</th>';
echo '<th>'. ucfirst($amountName).'</th>';
echo '<th>'. ucfirst($methodName).'</th>';
echo '<th>'. ucfirst($statusName).'</th>';
echo '</tr>';
echo '</thead>';