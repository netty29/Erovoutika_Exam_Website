<?php
include 'includes/connectdb.php';

// inherits exam id from the exam list
$clExID = $_GET['clExID']; 

    $examQuery = mysqli_query($connectdb, "SELECT * FROM tbexam where clExID = '$clExID'");
      while($row = mysqli_fetch_array($examQuery)){
        $clExID = $row['clExID'];
        $clExName = $row['clExName']; 
        $clExDescription = $row['clExDescription'];
        $clExInstructions = $row['clExInstructions'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Portal</title>
</head>
<body>
    <!------- PORTAL INFO CONTAINER -------->
    <div>
        <!-- Title Container -->
        <h1><?php echo $clExName ?></h1>
        <!-- Information Container -->
        <p><?php echo $clExDescription ?></p>
        <p><?php echo $clExInstructions ?></p>
        <!-- GETS THE EXAM ID THEN PASS IT TO THE QUESTION -->
        <?php echo
            '<a href="../src/webexam/UserExamTaker.php?clExID='.$clExID.'">'
            ?>
            Start Answering</a>
    </div>
</body>
</html>
