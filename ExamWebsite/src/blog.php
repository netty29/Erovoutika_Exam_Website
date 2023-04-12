<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
    <link rel="stylesheet" href="css/blog_style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>
</head>
<body>
    <?php include __DIR__."\includes\header.php"?>
    <div class="contributorsContainer">
      <div class="typingContainer">
        <div class="banner">
          <div class="typed_wrap">
          <h1>We Are <span class="typed"></span></h1>
          </div>
        </div>
      </div>
      <div class="developerContainer">
      <div class="blog-entry">
        <img class="blog-img" src="images/user images/RENZI.png" alt="">
        <div class="content-date"><div class="date">2022-10-14</div></div>
        <div class="blog-content">
          <div class="content-title"><h1>Renzi Delposo</h1></div>
          <div class="content-tag">FULL STOCK/PROJECT MANAGER</div>
        </div>
      </div>
      <div class="blog-entry">
        <img class="blog-img" src="images/user images/6_Untitleddesign.png" alt="">
        <div class="content-date"><div class="date">2022-10-15</div></div>
        <div class="blog-content">
          <div class="content-title"><h1>Angelica Santos</h1></div>
          <div class="content-tag">MAIN BACK-END DEVELOPER</div>
        </div>
      </div>
      <div class="blog-entry">
        <img class="blog-img" src="images/user images/CLISH.jpg">
        <div class="content-date"><div class="date">2022-10-16</div></div>
        <div class="blog-content">
          <div class="content-title"><h1>Clisheyl Ruth Diestro</h1></div>
          <div class="content-tag">FRONT-END DEVELOPER</div>
        </div>
      </div>
      <div class="blog-entry">
      <img class="blog-img" src="images/user images/PAM.jpg">
      <div class="content-date"><div class="date">2022-10-16</div></div>
      <div class="blog-content">
        <div class="content-title"><h1>Pamela Rose Dela Torre</h1></div>
        <div class="content-tag">DOCUMENTATION/FRONT-END</div>
      </div>
      </div>
      <div class="blog-entry">
      <img class="blog-img" src="images/blog_user.png">
      <div class="content-date"><div class="date">2022-10-16</div></div>
      <div class="blog-content">
        <div class="content-title"><h1>Joshua Macoy Cabanza</h1></div>
        <div class="content-tag">BAC-END DEVELOPER</div>
      </div>
      </div>
      <div class="blog-entry">
        <img class="blog-img" src="images/blog_user.png">
        <div class="content-date"><div class="date">2022-10-16</div></div>
        <div class="blog-content">
          <div class="content-title"><h1>Kenneth Valerio</h1></div>
          <div class="content-tag">FRONT-END DEVELOPER</div>
        </div>
      </div>
      </div>
      
    </div>
    
    

    
    <script>
        $(function(){
  $(".typed").typed({
    strings: ["Developers.", "Designers.", "People."],
    // Optionally use an HTML element to grab strings from (must wrap each string in a <p>)
    stringsElement: null,
    // typing speed
    typeSpeed: 30,
    // time before typing starts
    startDelay: 1200,
    // backspacing speed
    backSpeed: 20,
    // time before backspacing
    backDelay: 500,
    // loop
    loop: true,
    // false = infinite
    loopCount: 5,
    // show cursor
    showCursor: false,
    // character for cursor
    cursorChar: "|",
    // attribute to type (null == text)
    attr: null,
    // either html or text
    contentType: 'html',
    // call when done callback function
    callback: function() {},
    // starting callback function before each string
    preStringTyped: function() {},
    //callback for every typed string
    onStringTyped: function() {},
    // callback for reset
    resetCallback: function() {}
  });
});
    </script>
  </body>

</html>