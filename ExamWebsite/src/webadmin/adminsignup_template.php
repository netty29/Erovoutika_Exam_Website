<?php
include '../includes/connectdb.php';
	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin_signup_style.css">
    </head>
    <body>
  <section class="h-100 bg-primary">
    <div class="container py-5 h-10">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
              <img src="images/Logo2light.png" class="adsulogo" alt="logo">
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Admin Registration Form</h3>

                  <form action="signup.php" method="post">

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                      <input type="text" name="clUrFirstname" id="clUrFirstname" class="form-control form-control-md" />
                      <label class="form-label" for="clUrFirstname">First Name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="clUrLastname" id="clUrLastname" class="form-control form-control-md" />
                        <label class="form-label" for="clUrLastname">Last Name</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="clUrUsername" id="clUrUsername" class="form-control form-control-md" />
                        <label class="form-label" for="clUrUsername">Username</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="password" name="clUrPassword" id="clUrPassword" class="form-control form-control-md" />
                        <label class="form-label" for="clUrPassword">Password</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                      <input type="text" name="clUrcontact_num" id="clUrcontact_num" class="form-control form-control-md" />
                      <label class="form-label" for="clUrcontact_num">Contact Number</label>
                  </div>

                  <div class="form-outline mb-4">
                      <input type="email" name="clUremail" id="clUremail" class="form-control" />
                      <label class="form-label" for="clUremail">Email</label>
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

                  <div class="form-outline mb-4">
                      <input type="text" name="clUraddress" id="clUraddress" class="form-control form-control-md" />
                      <label class="form-label" for="clUraddress">Address</label>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <button type="button" class="btn btn-light btn-md"><a href="AdminHome.php">Return</a></button>
                    <button type="submit" formaction="../crud/tbusersAddAdmin.php" class="btn btn-primary btn-md ms-2">Register</button>
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

