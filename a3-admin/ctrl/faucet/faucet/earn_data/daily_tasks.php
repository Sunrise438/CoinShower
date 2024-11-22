<?php 
//count daily paid user
$sql = "SELECT COUNT(id), DAY(date) FROM faucet_history  "
        . "WHERE MONTH(date) = MONTH(CURRENT_TIMESTAMP()) AND status = 1 GROUP BY DAY(date)";
$result = $conn->query($sql);


if ($result->num_rows>0){
    $date = array();
    $day_earned = array();
    while ($row = $result->fetch_assoc()){
        
        $date[] = $row['DAY(date)'];
        $day_tasks[] = $row['COUNT(id)'];
        
    }
    
    $js_date_tasks = json_encode($date);
    $js_day_tasks = json_encode($day_tasks);
    
}
?>

<script type='text/javascript'>
<?php 

echo "var xValuesTasks = $js_date_tasks ;\n";
echo "var yValuesTasks = $js_day_tasks ;\n";

?>
</script>



