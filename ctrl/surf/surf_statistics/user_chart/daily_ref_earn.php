<?php 
//count daily paid user
$sql = "SELECT SUM(FLamount), DAY(FLdate) FROM flsurf_history  "
        . "WHERE MONTH(FLdate) = MONTH(CURRENT_TIMESTAMP()) AND FLref_email = '$FLuname' GROUP BY DAY(FLdate)";
$result = $conn->query($sql);


if ($result->num_rows>0){
    $date_ref = array();
    $day_earned_ref = array();
    while ($row = $result->fetch_assoc()){
        
        $date_ref[] = $row['DAY(FLdate)'];
        $ref_amount = $row['SUM(FLamount)']/100*$earn_ref_commission;
        $day_earned_ref[] = number_format($ref_amount,8);
        
    }
    
    $js_date_ref = json_encode($date_ref);
    $js_day_earned_ref = json_encode($day_earned_ref);
    
}
?>

<script type='text/javascript'>
<?php 

echo "var xValuesRef = $js_date_ref ;\n";
echo "var yValuesRef = $js_day_earned_ref ;\n";

?>
</script>



