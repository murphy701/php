<?php
	require_once '../config.php';
	require_once 'inc/header.php';
	$con = mysqli_connect("localhost", "root", "", "sms_db");

			$prefix = "BO";
			$code = sprintf("%'.04d",1);// %04d -> 0005
			$sql="select * from purchase_order_list where 'bo_code' = '".$prefix.'-'.$code."' ";
			while(true){
			if(mysqli_query($con, $sql)){
				$code=sprintf("%'.04d", $code+1);
				echo "hello";
			}else{
				break;
			}
			mysqli_close($con);
		}
			/*while(true){
				$check_code = $this->conn->query("SELECT * FROM `purchase_order_list` where po_code ='".$prefix.'-'.$code."' ")->num_rows;
				if($check_code > 0){
					$code = sprintf("%'.04d",$code+1);
				}else{
					break;
				}
			}*/
			$_POST['bo_code'] = $prefix."-".$code;
			$bo_code = $prefix."-".$code;

	$sql = "select * from back_order_list where bo_code='$bo_code';";
	mysqli_query($con, $sql);
	mysqli_close($con);
	

		extract($_POST);
		echo "
		$po_id
		$bo_code
		$supplier_id ?
		$amount

		$item_id
		$price
		$unit
		$total";
		/*
$sql = "select * from back_order_list where bo_code='$bo_code';";;
$result = mysqli_query($con, $sql); // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<table border='1'>";
while ($row = mysqli_fetch_assoc($result)) { // Important line, returns assoc array
    echo "<tr>";
    foreach ($row as $field => $value) { 
        echo "<td>" . htmlspecialchars($value) . "</td>"; 
    }
    echo "</tr>";
}
echo "</table>";
*/
?>
