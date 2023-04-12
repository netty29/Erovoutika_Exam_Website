<?php 
// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";
include_once __DIR__."/connectdb.php";
$to_home = "#home";

$index = array("/", "/index.php");

if (!in_array($_SERVER['REQUEST_URI'], $index)) { 
  $to_home = "/../index.php";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/header_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
  <body>

    <header>

      <a href="<?php echo $to_home?>" class="brand"><img src="/src/images/Logo2.png" id="logo"></a>
      <div class="menu" id="menu-icon">
          <div class="btn">
            <i class="fas fa-times close-btn"></i>
          </div>
          <div class="basicNav">
            <a href="<?php echo $to_home?>">Home</a>
            <a href="#about-section">About</a>
            <a href="/src/blog.php">Blog</a>
            <a href="/src/exam_enroll.php">Exam&nbsp;List</a>
            <a href="/src/learn.php">Tutorial</a>
          </div>
          <div class="userNav">
          <?php if (empty($_SESSION["admin_sid"]) && empty($_SESSION["client_sid"])):?>
          <a href="/src/login.php">Login</a>
          <a href="/src/signup.php">
            <button id="signupbtn">
              Signup
            </button>
          </a>
          <?php else: ?>
          <a class="dropdown-item" href="/src/includes/logout.php">
            <button id="signupbtn">Logout</button>
          </a>
          <?php endif; ?>
          
          </div>
        </div>
        
          
      <div class="btn">
        <i class="fas fa-bars menu-btn"></i>
      </div>
    </header>  
    
    </body>

    <script>
      //Javascript for Navigation effect on scroll
      window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle('sticky', window.scrollY > 0);
      });
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
          document.getElementById("logo").style.height = "40px";
          document.getElementById("logo").src="/src/images/Logo2light.png";
        } else {
          document.getElementById("logo").style.height = "80px";
          document.getElementById("logo").src="/src/images/Logo2.png";
        }
      }

      //Javascript for responsive navigation sidebar Nav
      var menu = document.querySelector('.menu');
      var login = document.querySelector('.userNav')
      var menuBtn = document.querySelector('.menu-btn');
      var closeBtn = document.querySelector('.close-btn');

      menuBtn.addEventListener("click", () => {
        menu.classList.add('active');
        loginNav.classList.add('active');
      });

      closeBtn.addEventListener("click", () => {
        menu.classList.remove('active');
        loginBav.classList.remove('active');
      });
    </script>
  
</html>