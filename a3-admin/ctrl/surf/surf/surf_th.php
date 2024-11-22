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

//set order type
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
echo '<th> <a href="?'.$t.'o=username&q='.$q.'">'. ucfirst($usernameName).'</a></th>';
echo '<th>'. ucfirst($urlName).'</th>';
echo '<th> <a href="?'.$t.'o=bal&q='.$q.'">'. ucfirst($balanceName).'</a></th>';
echo '<th> <a href="?'.$t.'o=price&q='.$q.'">'. ucfirst($priceName).'</a></th>';
echo '<th> <a href="?'.$t.'o=duration&q='.$q.'">'. ucfirst($durationName).'</a></th>';
echo '<th> <a href="?'.$t.'o=view&q='.$q.'">'. ucfirst($viewName).'</a></th>';
echo '<th>'. ucfirst($targetCountryName).'</th>';
echo '<th>'. ucfirst($statusName).'</th>';
echo '<th>'. ucfirst($optionalName).'</th>';
echo '</tr>';
echo '</thead>';