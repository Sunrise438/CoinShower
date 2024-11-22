<?php 
//count daily statistics
$sql = "SELECT COUNT(id), SUM(amount), DAY(date) FROM shortlinks_history  "
        . "WHERE link = '$link' AND status = 1  AND MONTH(date) = MONTH(CURRENT_TIMESTAMP()) AND status = 1 GROUP BY DAY(date)";
$result = $conn->query($sql);


if ($result->num_rows>0){
    $date = array();
    $day_earned = array();
    while ($row = $result->fetch_assoc()){
        
        $date[] = $row['DAY(date)'];
        $day_paid[] = number_format($row['SUM(amount)'],8);
        $day_shortlinks[] = $row['COUNT(id)'];
        
    }
    
    $js_date = json_encode($date);
    $js_day_paid = json_encode($day_paid);
    $js_day_shortlinks = json_encode($day_shortlinks);
    
}
?>

<script type='text/javascript'>
<?php 

echo "var xValues = $js_date ;\n";
echo "var yValuesPaid = $js_day_paid ;\n";
echo "var yValuesShortlinks = $js_day_shortlinks ;\n";

?>
</script>



