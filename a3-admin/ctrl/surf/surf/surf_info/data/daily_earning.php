<?php 
//count daily paid user
$sql = "SELECT SUM(amount), DAY(date) FROM surf_history  "
        . "WHERE MONTH(date) = MONTH(CURRENT_TIMESTAMP()) GROUP BY DAY(date)";
$result = $conn->query($sql);


if ($result->num_rows>0){
    $date = array();
    $day_earned = array();
    while ($row = $result->fetch_assoc()){
        
        $date[] = $row['DAY(date)'];
        $day_earned[] = number_format($row['SUM(amount)'],8);
        
    }
    
    $js_date = json_encode($date);
    $js_day_earned = json_encode($day_earned);
    
}
?>

<script type='text/javascript'>
<?php 

echo "var xValues = $js_date ;\n";
echo "var yValues = $js_day_earned ;\n";

?>
</script>



