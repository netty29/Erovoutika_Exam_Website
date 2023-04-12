<!DOCTYPE html>
<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/src/includes/connectdb.php';
?>
<html>
<head>
	<title></title>
</head>
<?php
$plan = $_GET['plan'];
$method = $_GET['method'];
$planText;
$methodText;
switch($plan){
	case 1:
	$planText = "595 6 Monthly Payments";
	break;
	case 2:
	$planText = "2995 One Time Payment";
	break;
}
switch($method){
	case 1:
	$methodText = "mastercard";
	break;
	case 2:
	$methodText = "gcash";
	break;
	case 3:
	$methodText = "maya";
	break;
	case 4:
	$methodText = "bpi";
	break;
}
?>
<body>
	<h1>You have chosen
		<?php
			$res = $connectdb->query("SELECT * FROM tbExam WHERE clExID = ".$_GET['id']);
            while($row = $res->fetch_array(MYSQLI_NUM)){
            	echo " ".$row[1]." ";
            }
		?>
		Exam
	</h1>
	<h1>Plan: <?php echo strtoupper($planText);?> </h1>
	<h1>Payment Method: <?php echo strtoupper($methodText);?> </h1>
	<button id="toReg">Proceed to Exam </button>
</body>
</html>
<script>
	var toReg = document.getElementById("toReg");
	var sessionId;
	sessionId = '<?php echo (isset($_SESSION['client_sid']))?$_SESSION['client_sid']:''; ?>';
	function proceed(){
		
		if (sessionId != ''){
			window.location.href="examportal_template.php?clExID=<?php echo $_GET['id']; ?>";
		}
		else if(sessionId == ''){
			window.location.href="login.php";
		}
	}
	toReg.addEventListener("click",proceed);
</script>