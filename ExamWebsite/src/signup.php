<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/user_signup_style.css">
    <title>Erovoutika | Signup</title>
   </head>
<body>
<div class="container">
<img src="images/Logo2light.png" class="logo1" alt="logo">
    <div class="wrapper">
        <div class="title"><span>Signup Form</span></div>
            <form action="signup.php" method="post">
            <div class="input-box">
                <input type="text" name="clUrFirstname" placeholder="Firstname" required>
            </div>
            <div class="input-box">
                <input type="text" name="clUrLastname" placeholder="Lastname" required>
            </div>
            <div class="input-box">
                <input type="text" name="clUrUsername" placeholder="Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="clUrPassword"placeholder="Password" required>
            </div>
            <div class="input-box">
                <input type="text" name="clUrcontact_num" placeholder="Contact" required>
            </div>
            <div class="input-box">
                <input type="text" name="clUremail" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="text" name="clUraddress" placeholder="Address" required>
            </div>
            <div class="policy">
                <input type="checkbox">
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button">
                <!--<input type="Submit" formaction="crud/tbusers_adddefault.php" value="Register Now">-->
                <input type="Submit" formaction="crud/tbusersAddSignUp.php" value="Register Now">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="login.php">Login now</a></h3>
            </div>
            <center>
            <div class="return-link"><a href="../index.php">Return to Homepage</a></div>
            </center>
            </form>
        </div>
    </div>
</div>
</body>
</html>
