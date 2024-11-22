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
echo '<th> <a href="?'.$t.'o=id&q='.$q.'">'. ucfirst($idName).'</a></th>';
echo '<th> <a href="?'.$t.'o=date&q='.$q.'">'. ucfirst($urlName).'</a></th>';
echo '<th> <a href="?'.$t.'o=bal&q='.$q.'">'. ucfirst($balanceName).'</a></th>';
echo '<th> <a href="?'.$t.'o=campaign&q='.$q.'">'. ucfirst($priceName).'</a></th>';
echo '<th> <a href="?'.$t.'o=payout&q='.$q.'">'. ucwords($todayName.' '.$viewedName).'</a></th>';
echo '<th> <a href="?'.$t.'o=payout&q='.$q.'">'. ucfirst($viewedName).'</a></th>';
echo '<th> <a href="?'.$t.'o=app&q='.$q.'">'. ucfirst($countriesName).'</a></th>';
echo '<th> <a href="?'.$t.'o=subid&q='.$q.'">'. ucfirst($dateName).'</a></th>';
echo '<th> <a href="?'.$t.'o=status&q='.$q.'">'. ucfirst($statusName).'</a></th>';
echo '<th> <a href="?'.$t.'o=status&q='.$q.'">'. ucfirst($optionName).'</a></th>';
echo '</tr>';
echo '</thead>';