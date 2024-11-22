<?php

$sql = "DELETE FROM shortlinks WHERE id = '$aid'";
if ($conn->query($sql) === TRUE){
    header('location:shortlinks');
}

