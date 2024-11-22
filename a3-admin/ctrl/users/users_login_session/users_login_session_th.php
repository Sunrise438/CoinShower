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
echo '<th> <a href="?'.$t.'o=email&q='.$q.'">'. ucfirst($emailName).'</a></th>';
echo '<th> <a href="?'.$t.'o=login&q='.$q.'">'. ucwords($loginName.' '.$tokenName).'</a></th>';
echo '<th> <a href="?'.$t.'o=status&q='.$q.'">'. ucfirst($statusName).'</a></th>';
echo '<th> <a href="?'.$t.'o=date&q='.$q.'">'. ucfirst($dateName).'</a></th>';
echo '<th> <a href="?'.$t.'o=country&q='.$q.'">'. ucfirst($countryName).'</a></th>';
echo '<th> <a href="?'.$t.'o=ip&q='.$q.'">'. strtoupper($ipName).'</a></th>';
echo '</tr>';
echo '</thead>';