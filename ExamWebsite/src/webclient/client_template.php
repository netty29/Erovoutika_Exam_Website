<?php
include '../includes/connectdb.php';


if($_SESSION['client_sid']==session_id()){
	if(!isset($_SESSION["client_sid"]) || $_SESSION["client_sid"] !== session_id()){
        header("location: ../login_template.php");
        exit;
    }		
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client</title>
	<!--
		This is the styles stuff.
			since css folder is 1 folders back.
			I use ../
			If its 2 folder back.
			Use ../../
	 -->
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>

		/* For Phase 2 
		 * Include this "include_once" to call the header and footer of the webclient files.
		 * Make sure that only one file [header and footer] will be called in every other webclients' files.
		 */

	<?php 
	include_once 'header.php';
	?>

    <p>im client</p>
    <a href="/includes/logout.php">logout</a>

	<?php 
	include_once 'footer.php';
	?>

</body>
</html>
<?php
    }else
	{
		if($_SESSION['admin_sid']==session_id()){
			header("location:../includes/error.php");		
		}
		else{
				header("location:../login_template.php");
			}
	}
?>