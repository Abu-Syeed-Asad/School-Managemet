<?php 
include "DB_connection.php";
include "data/setting.php";
$setting = getSetting($conn);

if ($setting != 0) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>গোবিন্দগঞ্জ সরকারি উচ্চ বিদ্যালয়</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo1.jpg">
	<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body class="body-home">
    <div class="black-fill"><br /> <br />
    	<div class="container">
    	<nav class="navbar navbar-expand-lg bg-light"
    	     id="homeNav">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">
		    	<img src="logo1.jpg" width="40">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#about">About</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#contact">Contact</a>
		        </li>
		      </ul>
		      <ul class="navbar-nav me-right mb-2 mb-lg-0">
		      	<li class="nav-item">
		          <a class="nav-link" href="login.php">login</a>
		        </li>
		      </ul>
		  </div>
		    </div>
		</nav>
        <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
        	<img src="logo1.jpg" >
        	<h4><font color="white">Welcome to Gobindaganj Govt. High School </font></h4>
        	<p>শিক্ষাই জাতির মেরুদণ্ড </p>
        </section>
        <section id="about"
                 class="d-flex justify-content-center align-items-center flex-column">
        	<div class="card mb-3 card-1">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="logo1.jpg" class="img-fluid rounded-start" >
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">About Us</h5>
			        <p class="card-text">Gobindaganj Government High School is a secondary school in Rangpur Division, Bangladesh. It stands on the central town area of Gobindaganj, Gobindaganj Upazila, Gaibandha District. It was established in 1912. EIIN: 121195</p>
			        <p class="card-text"><small class="text-muted"><b>Gobindaganj Govt. High School</b></small></p>
			      </div>
			    </div>
			  </div>
			</div>
        </section>
        <section id="contact"
                 class="d-flex justify-content-center align-items-center flex-column">
        	<form method="post"
    	          action="req/contact.php">
        		<h3>Contact Us</h3>
        		<?php if (isset($_GET['error'])) { ?>
	    		<div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
				</div>
				<?php } ?>
				<?php if (isset($_GET['success'])) { ?>
		          <div class="alert alert-success" role="alert">
		           <?=$_GET['success']?>
		          </div>
		        <?php } ?>
			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
			    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Full Name</label>
			    <input type="text" name="full_name" class="form-control">
			  </div>
			  <div class="mb-3">
			    <label class="form-label">Message</label>
			    <textarea class="form-control"name="message" rows="4"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Send</button>
			</form>
        </section>
        <div class="text-center text-light">


        	 <footer class="footer">

    <div class="footer-container">

        <!-- Logo -->
        <div class="footer-box logo-box">
            <h2>Kids Education</h2>
            <p>Quality education for every child.</p>
        </div>

        <!-- Quick Links -->
        <div class="footer-box">
            <h3>Quick Links</h3>

            <ul>
                <li><a href="#"><i class="fas fa-angle-right"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> About</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Contact</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div class="footer-box">
            <h3>Keep In Touch</h3>

            <p><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</p>
            <p><i class="fas fa-phone"></i> +880 123456789</p>
            <p><i class="fas fa-envelope"></i> rakib932676@gmail.com</p>

            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
            </div>

        </div>

    </div>

    <div class="footer-bottom">

        <p>© 2026 Rakibul Hasan. All Rights Reserved.</p>

        <div class="footer-links">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Support</a>
        </div>

    </div>

</footer>
    	</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>
<?php }else {
	header("Location: logo1in.php");
	exit;
}  ?>