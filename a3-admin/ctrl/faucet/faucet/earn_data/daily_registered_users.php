<?php 
//count daily paid user
$sql = "SELECT COUNT(id), DAY(date) FROM users  "
        . "WHERE MONTH(date) = MONTH(CURRENT_TIMESTAMP()) AND status = 1 GROUP BY DAY(date)";
$result = $conn->query($sql);


if ($result->num_rows>0){
    $js_registered_date = array();
    $js_day_registered = array();
    while ($row = $result->fetch_assoc()){
        
        $js_registered_date[] = $row['DAY(date)'];
        $js_day_registered[] = $row['COUNT(id)'];
        
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



