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
if (isset($_GET['t'])){
    echo '<th> <a href="?'.$t.'o=id&q='.$q.'">'. ucfirst($idName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=email&q='.$q.'">'. ucfirst($emailName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=ac&q='.$q.'">'. ucfirst($accountName.' '.$balanceName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=pb&q='.$q.'">'. ucfirst($purchaseName.' '.$balanceName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=earn&q='.$q.'">'. ucfirst($earnedName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=ref_earn&q='.$q.'">'. ucfirst($refName.' '.$earnedName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=date&q='.$q.'">'. ucfirst($dateName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=country&q='.$q.'">'. ucfirst($countryName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=ip&q='.$q.'">'. strtoupper($ipName).'</a></th>';
    
} else {
    echo '<th> <a href="?'.$t.'o=tot&q='.$q.'">'. ucfirst($totalName).'</a></th>';
    echo '<th> <a href="?'.$t.'o=country&q='.$q.'">'. ucfirst($countryName).'</a></th>';
}


echo '</tr>';
echo '</thead>';