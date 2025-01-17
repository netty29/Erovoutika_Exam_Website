<?php
include '../includes/connectdb.php';
	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_signup_style.css">
        <title>Admin Signup Template</title>
    </head>
    <body>
    <div class="container">   
      <img src="images/Logo2light.png" class="logo" alt="logoast">
  <section class="h-100 bg-primary">
    <div class="container py-5 h-10">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <div class="wrapper">
                    <div class="title"><span>Admin Registration Form</span></div>

                  <form action="signup.php" method="post">

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outlinefn">
                        <input type="text" name="clUrFirstname" placeholder="Firstname" required> <div class="col-md-6 mb-4">
                        </div>
                      </div>
                      <div class="form-outlineln">
                        <input type="text" name="clUrLastname" placeholder="Lastname" required>
                      </div>
                      </div>
                    </div>
                    
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="clUrUsername" placeholder="Username" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="password" name="clUrPassword" placeholder="Password" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="clUrcontact_num" placeholder="Contact Number" required>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" name="clUremail" placeholder="Email Address" required>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" name="clUraddress" placeholder="Address" required>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <select class="form-select" aria-label="" name = "clUrLevel">
                      <option value="0" selected>Admin</option>
                      <option value="1">Client</option>
                      </select>
                      <label class="form-label" for="clUrLevel">User Level</label>
                    </div>
                  </div>

                
<center>
                <div class="input-box button">
                <input type="Submit" formaction="../crud/tbusersAddAdmin.php" value="Register">
                 </div>
                  <div class="d-flex justify-content-end pt-3">
                    <div class="return-link"><a href="AdminHome.php">Return to Homepage</a></div>
                    
                </center>

                </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
<?php
	}else
	{
		if($_SESSION['staff_sid']==session_id()){
			header("location:../includes/error.php");		
		}
		else{
			if($_SESSION['customer_sid']==session_id()){
				header("location:../includes/error.php");		
			}else{
				header("location:../login_template.php");
			}
		}
	}
?>

