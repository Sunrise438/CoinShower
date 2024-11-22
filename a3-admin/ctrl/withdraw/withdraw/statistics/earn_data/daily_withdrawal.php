<?php 
//count daily paid user
$sql = "SELECT COUNT(id), SUM(amount), DAY(date) FROM withdraw_history  "
        . "WHERE MONTH(date) = MONTH(CURRENT_TIMESTAMP()) AND status = 1 GROUP BY DAY(date)";
$result = $conn->query($sql);


if ($result->num_rows>0){
    $date = array();
    $day_earned = array();
    while ($row = $result->fetch_assoc()){
        
        $date[] = $row['DAY(date)'];
        $day_paid[] = number_format($row['SUM(amount)'],8);
        $day_withdrawal[] = $row['COUNT(id)'];
        
    }
    
    $js_date = json_encode($date);
    $js_day_paid = json_encode($day_paid);
    $js_day_withdrawal = json_encode($day_withdrawal);
    
}
?>

<script type='text/javascript'>
<?php 

echo "var xValues = $js_date ;\n";
echo "var yValuesPaid = $js_day_paid ;\n";
echo "var yValuesWithdrawal = $js_day_withdrawal ;\n";

?>
</script>



