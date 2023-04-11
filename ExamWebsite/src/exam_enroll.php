<?php 
include_once '../src/includes/connectdb.php';
if($_SESSION['client_sid'] == null){
    echo "<script>";
    echo "window.location = '../src/login.php';";
    echo "</script>";
}
$searchInput;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/exam_enroll_style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha383-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha383-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp3YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/24d5cf3efd.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <title>Enroll</title>
</head>
<body>
    <div>
        <center>
            <table id="paymentMessage" style="border:1px black solid;background-color: white; position: fixed; z-index: 99; left: 50%; top: 50%; transform: translate(-50%, -50%); ">
                <tr>
                    <td align="right">
                        <button id = "closePayBtn">Close</button>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        Please Select your payment plan
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <select id = "payPlan">
                            <option value="1">595 6 monthly payments</option>
                            <option value="2">2995 One-time payment</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        Please Select your payment method
                    </td>
                </tr>
                <tr>
                    <td align="center"> 
                        <select id = "payMethod">
                            <option value="1">mastercard</option>
                            <option value="2">gcash</option>
                            <option value="3">maya</option>
                            <option value="4">bpi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <button id = "payBtn">Apply Now</button>
                    </td>
                </tr>
            </table>
        </center>
    </div>
<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0F3695">
        <div class="container-fluid">
            <a href="#" class="brand"><img src="images/ero-logo-white.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            
        </div>
    </nav>
    <form class="d-flex" method="POST">
        <div class="search-box">
            <input type="text" autocomplete="off" placeholder="Search Exam" id = "searchExam" name = "search"/>
                <?php
                    error_reporting(0);
                    $searchInput=$_POST['search'];
                    error_reporting(E_WARNING);
                ?>
                <div class="result">
            </div>
        </div>
    </form>

    <!-- Multi-Step Table Form -->
        <div id="multi_step_form">
            <div class="container">
                <div id="multistep_nav">
                <div class="progress_holder">
                </div>
                <div class="progress_holder">
                </div>
                <div class="progress_holder">
                </div>
                <div class="progress_holder">
                </div>
                <div class="progress_holder">
                </div>
                </div>


        <!-- Exam Card -->

        <?php
        $stepNum = 1;
        $betStart = 1;
        $betEnd = 6;
        $examCount = 0;
        $total = $connectdb->query("SELECT COUNT(*) FROM tbExam");
        $row = $total->fetch_array(MYSQLI_NUM);
        $pages = ceil($row[0]/5);
        for($i=0;$i<$pages;$i++){
            echo '<fieldset class="step" id="step'.$stepNum.'">';
            if($stepNum > 1){
                echo '<div class="prevStep" style="border-color: #0035c6;">Prev</div>';
            }
            echo '<div class="exam_container">';
            echo '<div class="row">';
            if(empty($searchInput) || $searchInput == null || $searchInput == ""){
                $res = $connectdb->query("SELECT * FROM tbExam WHERE clExID BETWEEN ".$betStart." AND ".$betEnd."");
            }
            else{
                if($stepNum == 1){
                    $res = $connectdb->query("SELECT * FROM tbExam WHERE clExName LIKE '%".$searchInput."%' LIMIT 6");
                }
                else{
                    $res = $connectdb->query("SELECT * FROM tbExam WHERE clExName LIKE '%".$searchInput."%' LIMIT 6,6");
                }
            }
            while($row3 = $res->fetch_array(MYSQLI_NUM)){
                echo '<div class="col-sm-4 py-4">';
                echo '<div class="card h-200">';
                echo '<div class="card-body border border-3 border-primary rounded ">';
                echo '<h2 class="d-flex border-5 border-bottom border-primary mb-4">';
                echo  $row3[1];
                echo '</h2>';
                echo '<div><button type="button" class="btn btn-primary" id="'.$row3[0].'" onclick="enroll(this)">Take Quiz</button></div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                
            }
            echo '</div>';
            $res2 = $connectdb->query("SELECT COUNT(`clExID`) FROM `tbexam` WHERE clExName LIKE '%".$searchInput."%'");
            while($row2 = $res2->fetch_array(MYSQLI_NUM)){
                $examCount = $row2[0];
            }
            if($examCount > $betEnd){
                echo '<div class="nextStep" style="border-color: #0035c6;">Next</button></div>';
            }
            echo '</fieldset>';
            $stepNum += 1;
            $betStart += 6;
            $betEnd += 6;
        }
        ?>
        
        </div>

        <!-- Search Bar -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script>
            $(document).ready(function(){
                $('.search-box input[type="text"]').on("keyup input", function(){
                    /* Get input value on change */
                    var inputVal = $(this).val();

                    var resultDropdown = $(this).siblings(".result");
                    if(inputVal.length){
                        $.get("backend-search.php", {term: inputVal}).done(function(data){
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else{
                        resultDropdown.empty();
                    }
                });
                
                // Set search input value on click of result item
                $(document).on("click", ".result p", function(){
                    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
                });
            });
            </script>
            

            <!-- Multi Table-->
            <script>
                  // start //
                $('.progress_holder:nth-child(1)').addClass('activated_step');

                // Manage next and previous buttons //
                $(".nextStep").click(function(){
                // button is inside fieldset so set current and next vars //
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();
                // make sure all fields are filled in //
                var empty = current_fs.find("input.required-field").filter(function() {
                    return this.value === "";
                });
                if (empty.length) {
                    alert('Please fill in all fields.');
                } else {
                //show the next fieldset
                next_fs.fadeIn(150,'linear').addClass('current');
                //hide the current fieldset with style
                current_fs.fadeOut(0,'linear').removeClass('current');
                // change nav class //
                if ($('fieldset.current').attr('id') == 'step2') {
                    $('.progress_holder:nth-child(2)').addClass('activated_step');
                }
                if ($('fieldset.current').attr('id') == 'step3') {
                    $('.progress_holder:nth-child(3)').addClass('activated_step');
                }
                if ($('fieldset.current').attr('id') == 'step4') {
                    $('.progress_holder:nth-child(4)').addClass('activated_step');
                }
                if ($('fieldset.current').attr('id') == 'step5') {
                    $('.progress_holder:nth-child(5)').addClass('activated_step');
                }
                }
                });
                $(".prevStep").click(function(e){
                e.preventDefault();
                    current_fs = $(this).parents('fieldset');
                    previous_fs = $(this).parents('fieldset').prev();
                    //show the previous fieldset
                    previous_fs.fadeIn(150,'linear');
                    //hide the current fieldset with style
                    current_fs.fadeOut(0,'linear');

                    if ($(previous_fs).attr('id') == 'step1') {
                    $('.progress_holder:nth-child(2)').removeClass('activated_step');
                    }
                    if ($(previous_fs).attr('id') == 'step2') {
                    $('.progress_holder:nth-child(3)').removeClass('activated_step');
                    }
                    if ($(previous_fs).attr('id') == 'step3') {
                    $('.progress_holder:nth-child(4)').removeClass('activated_step');
                    }
                    if ($(previous_fs).attr('id') == 'step4') {
                    $('.progress_holder:nth-child(5)').removeClass('activated_step');
                    }
                });

            </script>

        <footer class="bg-light text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #3b5998;"
                href="#!"
                role="button"
                ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #55acee;"
                href="#!"
                role="button"
                ><i class="fab fa-twitter"></i
            ></a>

            <!-- Google -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #dd4b39;"
                href="#!"
                role="button"
                ><i class="fab fa-google"></i
            ></a>

            <!-- Instagram -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #ac2bac;"
                href="#!"
                role="button"
                ><i class="fab fa-instagram"></i
            ></a>

            <!-- Linkedin -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #0082ca;"
                href="#!"
                role="button"
                ><i class="fab fa-linkedin-in"></i
            ></a>
            <!-- Github -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #333333;"
                href="#!"
                role="button"
                ><i class="fab fa-github"></i
            ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #0F3695;">
            © 2022 Copyright:
            <a class="text-white" href="#">erovoutika.com.ph</a>
        </div>
        <!-- Copyright -->
        </footer>
</body>
</html>
<script type="text/javascript">
    var paymentMessage = document.getElementById("paymentMessage");
    var closePayBtn = document.getElementById("closePayBtn");
    var payBtn = document.getElementById("payBtn");
    var searchVal = document.getElementById("searchExam");
    var searchTxt = searchVal.value;
    var id;
    function enroll(x){
        paymentMessage.style.visibility="visible";
        id = $(x).attr('id');
    }
    function closePay(){
        paymentMessage.style.visibility="hidden";
    }
    function paySubmit(){
        var payPlan = document.getElementById("payPlan");
        var payMethod = document.getElementById("payMethod");
        var payPlanVal = payPlan.value;
        var payMethodVal = payMethod.value;
        window.location.href="payment.php?id="+id+"&plan="+payPlanVal+"&method="+payMethodVal+"";
    }
    payBtn.addEventListener("click", paySubmit);
    closePayBtn.addEventListener("click", closePay);
    paymentMessage.style.visibility="hidden";
</script>