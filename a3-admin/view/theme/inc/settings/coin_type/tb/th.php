<?php

if (isset($_GET['t'])){
    if (isset($_GET['token'])){
        $t = 'token='.$_GET['token'].'&';
    } else {
        $t = '';
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
echo '<th> <a href="?'.$t.'o=coin&q='.$q.'">'. ucfirst($coinName).'</a></th>';
echo '<th> <a href="?'.$t.'o=value&q='.$q.'">'. ucfirst($valueName).' (USD)</a></th>';
echo '<th> <a href="?'.$t.'o=method&q='.$q.'">'. ucfirst($methodName).'</a></th>';
echo '<th> <a href="?'.$t.'o=dep_status&q='.$q.'">'. ucwords($depositName.' '.$statusName).'</a></th>';
echo '<th> <a href="?'.$t.'o=wid_status&q='.$q.'">'. ucwords($withdrawName.' '.$statusName).'</a></th>';
echo '<th>'. ucfirst($optionName).'</th>';
echo '</tr>';
echo '</thead>';