<?php

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
echo '<th> <a href="?o=id&q='.$q.'">'. ucfirst($idName).'</a></th>';
echo '<th> <a href="?o=amount&q='.$q.'">'. ucfirst($amountName).'</a></th>';
echo '<th> <a href="?o=usd&q='.$q.'">'. 'USD '.ucfirst($amountName).'</a></th>';
echo '<th> <a href="?o=view&q='.$q.'">'. ucfirst($viewName).'</a></th>';
echo '<th>'. ucfirst($todayName).' '.ucfirst($viewsName).'</th>';
echo '<th> <a href="?o=limit&q='.$q.'">'. ucfirst($limitName).'</a></th>';
echo '<th> <a href="?o=link&q='.$q.'">'. ucfirst($linkName).'</a></th>';
echo '<th> <a href="?o=shortlinks&q='.$q.'">'.ucfirst($shortlinksName).'</a></th>';
echo '<th>'. ucfirst($optionalName).'</th>';
echo '<th> <a href="?o=date&q='.$q.'">'. ucfirst($dateName).'</a></th>';
echo '</tr>';
echo '</thead>';