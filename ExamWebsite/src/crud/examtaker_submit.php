<?php
	// Establish Database Connection
    //require_once "../includes/connectdb.php";
    include "../includes/connectdb.php";
	
    //$sql_query = "";

    $UserExam_data = $_POST['UserExam_data_ajax'];
    $UserAnswer_data = $_POST['UserAnswer_data_ajax'];

    $clUeID_value = $UserExam_data['clUeID'];
    $clUrID_value = $UserExam_data['clUrID'];
    $clExID_value = $UserExam_data['clExID'];

    $UrScore = 0;
    
    // Inserting user exam info in table tbuserexam
    $sql_query = "INSERT INTO `tbuserexam` (
            `clUeID`, 
            `clUrID`, 
            `clExID`
        )
        VALUES (
            '$clUeID_value', 
            '$clUrID_value', 
            '$clExID_value'
        );
    ";
    $result = $connectdb->query($sql_query);

    // Inserting user exam info in table tbuserexamresult
    $sql_query = "INSERT INTO `tbuserexamresult` (
        `clExID`, 
        `clUrID`
    )
    VALUES (
        '$clExID_value',
        '$clUrID_value'
    );";
    $result = $connectdb->query($sql_query);

    for($question_count = 0; $question_count < count($UserAnswer_data); $question_count++) {
        $clUaQuestionID_value = $UserAnswer_data[$question_count]['clUaQuestionID'];
    
        if($UserAnswer_data[$question_count]['clQsType'] == 0) { // 0 = Fill in the Blanks
            $clUaAnswer = $UserAnswer_data[$question_count]['clUaAnswer'];
        }
        else if($UserAnswer_data[$question_count]['clQsType'] == 1) { // 1 = Hybrid Multiple Choice
            $clUaAnswer = implode(",",$UserAnswer_data[$question_count]['clUaAnswer']);
        }

        $sql_query = "INSERT INTO `tbuseranswer` (
                `clUeID`, 
                `clUaQuestionID`, 
                `clUaAnswer`
            )
            VALUES (
                '$clUeID_value', 
                '$clUaQuestionID_value', 
                '$clUaAnswer'
            );
        ";
        $result = $connectdb->query($sql_query);
        
        // Clear variables(Optional)
        unset($clUaQuestionID_value);
        unset($clUaAnswer);
    }
    
	/*if(!empty($sql_query)) {
        // Insert SQL Queries
        $update_sql_query = mysqli_multi_query($connectdb, $sql_query);
        
        if($update_sql_query){
                echo "Insertion to Database Successful";
                $sql = "UPDATE tbuserexamresult set clUrScore = 7889 where clUrID = 2 and clExID = 2;";
                $result = $connectdb->query($sql);
            }
        else{
            echo "Insertion to Database Failed";
            echo mysqli_error($connectdb);
        }
        
        // Clear $sql_query variable(Optional)
        unset($sql_query);
    }*/

    // Checking of exam
    // If the question type is fill in the blank, the system record the user's input
    // If the question type is hybrid multiple choice, the system record the user's chosen answer ID

    for($question_count = 0; $question_count < count($UserAnswer_data); $question_count++) {
        $clUaQuestionID_value = $UserAnswer_data[$question_count]['clUaQuestionID'];
        
        // Retrieve question's correct answer ID (clAsID) from tbquestion
        $sql = "SELECT clQsCorrectAnswer from tbquestion where clExID = $clExID_value and clQsID = $clUaQuestionID_value;";
        $result = $connectdb->query($sql);
        $row = $result->fetch_assoc();
        $correctAnsID = $row['clQsCorrectAnswer'];

        //Retrieve user's answer body from table tbuseranswer
        $sql = "SELECT clUaAnswer from tbuseranswer where clUeID = $clUeID_value and clUaQuestionID = $clUaQuestionID_value;";
        $result = $connectdb->query($sql);
        $row = $result->fetch_assoc();
        $userAns = $row['clUaAnswer'];  

        if($UserAnswer_data[$question_count]['clQsType'] == 0) { // 0 = Fill in the Blanks
            //Retrieve question's correct answer body from tbanswer
            $sql = "SELECT clAsBody from tbanswer where clQsID = $clUaQuestionID_value and clAsID = $correctAnsID;";
            $result = $connectdb->query($sql);
            $row = $result->fetch_assoc();
            $correctAns = $row['clAsBody'];  

            if ($correctAns == $userAns){
                $UrScore++;
            }
        }

        if($UserAnswer_data[$question_count]['clQsType'] == 1) { // 1 = Hybrid Multiple Choice

            if ($correctAnsID == $userAns){
                $UrScore++;
            }
        }

        // Clear variables(Optional)
        unset($clUaQuestionID_value);
        unset($clUaAnswer);
    }

    // Record user's score
    $sql = "UPDATE tbuserexamresult set clUrScore = $UrScore where clUrID = $clUrID_value and clExID = $clExID_value;";
    $result = $connectdb->query($sql);
	
	// End Database Connection
	mysqli_close($connectdb);

    // Clear variables(Optional)
    unset($UserExam_data);
    unset($UserAnswer_data);

    unset($clUeID_value);
    unset($clUrID_value);
    unset($clExID_value);
    
    unset($connectdb);
?>
