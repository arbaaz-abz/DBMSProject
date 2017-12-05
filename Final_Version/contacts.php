<?php
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>RealEstate | Contacts</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/slider-2.css">
<link rel="stylesheet" type="text/css" media="screen" href="home/css/jqtransform.css">
<script src="home/js/jquery-1.7.min.js"></script>
<script src="home/js/jquery.easing.1.3.js"></script>
<script src="home/js/cufon-yui.js"></script>
<script src="home/js/vegur_400.font.js"></script>
<script src="home/js/Vegur_bold_700.font.js"></script>
<script src="home/js/cufon-replace.js"></script>
<script src="home/js/tms-0.4.x.js"></script>
<script src="home/js/jquery.jqtransform.js"></script>
<script src="home/js/FF-cash.js"></script>
<script>
$(document)
    .ready(function () {
    $('.form-1')
        .jqTransform();
    $('.slider')
        ._TMS({
        show: 0,
        pauseOnHover: true,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 1000,
        preset: 'fade',
        pagination: true,
        pagNums: false,
        slideshow: 7000,
        numStatus: false,
        banners: false,
        waitBannerAnimation: false,
        progressBar: false
    })
});
</script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="main">
  <!--==============================header=================================-->
  <header>
    <div>
      <div class="social-icons"> <span><?php echo $_SESSION['login_user']; ?></span></div>
      <br/><br/><br/>
      <nav>
        <ul class="menu">
          <li ><a href="booking.php">Home</a></li>
          <li><a href="bookingTicket.php">Book Bus</a></li>
          <li class="current"><a href="contacts.php">Contact</a></li>
          <li><a href="services.php">My Wallet</a></li>
          <li><a href="mytickets.php">Tickets</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div class="container_12">
      <div class="grid_8">
        <h2 class="top-1 p3">Contact form</h2>
        <form id="form" method="post" action="#">
          <fieldset>
            <label><strong>Your Name:</strong>
              <input type="text" value="">
            </label>
            <label><strong>Your E-mail:</strong>
              <input type="text" value="">
            </label>
            <label><strong>Your Message:</strong>
              <textarea></textarea>
            </label>
            <div class="btns"><a href="#" class="button">Clear</a><a href="#" class="button">Send</a></div>
          </fieldset>
        </form>
      </div>
      <div class="grid_4">
        <div class="left-1 margin">

          <h2 class="p3">Our contacts</h2>
          <dl>
            <dt class="color-1 p2"><strong>PESIT - South Campus , Hosur Rd, Konappana Agrahara, Electronic City, Bengaluru, Karnataka 560100<br>
              </strong></dt>
            <dd>Telephone  :  +919611906587</dd>
            <dd>E-mail  :  <a href="#" class="link">arbaaz2410@gmail.com</a></dd>
          </dl>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
  <p>© 2012 Ankush and Arbaaz</p>
</footer>
<script>Cufon.now();</script>
</body>
</html>
