<?php 
//count tasks
$sql = "SELECT COUNT(id), DAY(date) FROM surf_history  "
        . "WHERE MONTH(date) = MONTH(CURRENT_TIMESTAMP()) GROUP BY DAY(date)";
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



