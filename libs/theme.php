<?php

//theme info
$sql = "SELECT theme FROM theme WHERE id = '1'";
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $themeAction = $row['theme'];

} else {
    $themeAction = 'default';
}
