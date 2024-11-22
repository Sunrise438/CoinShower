<?php 
//count daily paid user
$sql = "SELECT COUNT(DISTINCT uname), SUM(amount), DAY(date) FROM deposit_history  "
        . "WHERE MONTH(date) = MONTH(CURRENT_TIMESTAMP()) AND status = 1 GROUP BY DAY(date)";
$result = $conn->query($sql);


if ($result->num_rows>0){
    $date = array();
    $day_earned = array();
    while ($row = $result->fetch_assoc()){
        
        $date[] = $row['DAY(date)'];
        $day_deposit[] = number_format($row['SUM(amount)'],8);
        $day_users[] = $row['COUNT(DISTINCT uname)'];
        
    }
    
    $js_date = json_encode($date);
    $js_day_deposit = json_encode($day_deposit);
    $js_day_users = json_encode($day_users);
    
}
?>

<script type='text/javascript'>
<?php 

echo "var xValues = $js_date ;\n";
echo "var yValuesDeposit = $js_day_deposit ;\n";
echo "var yValuesUsers = $js_day_users ;\n";

?>
</script>



