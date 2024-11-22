<?php 
//count daily paid user
$sql = "SELECT COUNT(FLid), DAY(FLdate) FROM flref  "
        . "WHERE MONTH(FLdate) = MONTH(CURRENT_TIMESTAMP()) AND FLemail = '$user_id' GROUP BY DAY(FLdate)";
$result = $conn->query($sql);


if ($result->num_rows>0){
    $js_registered_date = array();
    $js_day_registered = array();
    while ($row = $result->fetch_assoc()){
        
        $js_registered_date[] = $row['DAY(FLdate)'];
        $js_day_registered[] = $row['COUNT(FLid)'];
        
    }
    
    $js_registered_date = json_encode($js_registered_date);
    $js_day_registered = json_encode($js_day_registered);
    
}
?>

<script type='text/javascript'>
<?php 

echo "var xDays = $js_registered_date;\n";
echo "var yUsers = $js_day_registered ;\n";

?>
</script>



