<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Get Involved</title>
	<script src="../jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../function.js"></script>
	<script src="https://use.fontawesome.com/c30d6b056a.js"></script>
	<link rel="stylesheet" href="css/get-involved.css">
	<link rel="stylesheet" href="css/form-basic.css">
	<link rel="stylesheet" href="../css/nav.css">

</head>

<body>
<header>
<div class="mast">
<div class="logo">
<img id="fam" src="images/logo1.png">
<form id="form_donate" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="2KTGNBHRTN4K8">
                    <input id="input_donate" type="image" src="http://www.pngall.com/wp-content/uploads/2016/05/PayPal-Donate-Button-PNG-Clipart.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                </form>
<div class="social_media">
        <ul class="icons">
            <li><a href="https://www.facebook.com/4thFamilyInc/"><i class="fa fa-facebook-square fa-2x" style="color: #3b5988"; aria-hidden="true"></i></a></li>
            <li><a href="https://www.instagram.com/4thfamily/"<i class="fa fa-instagram fa-2x" style="color:#f77737"; aria-hidden="true"></i></a></li>
            <li><i class="fa fa-twitter-square fa-2x" style="color:#1da1f2"; aria-hidden="true"></i></li>
            <li><a href="https://www.linkedin.com/company/4th-family-inc/"<i class="fa fa-linkedin-square fa-2x" style="color:#0077b5"; aria-hidden="true"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCL1nDLWjTvjUyl9rg9yyJTA"><i class="fa fa-youtube-square fa-2x" style="color:#ff0000"; aria-hidden="true"></i></a></li>
           <!-- <li><form id="form_donate" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="2KTGNBHRTN4K8">
                    <input id="input_donate" type="image" src="http://www.pngall.com/wp-content/uploads/2016/05/PayPal-Donate-Button-PNG-Clipart.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                </form><!--<a class="donate" href="#">Make A Donation</a></li>-->
        </ul>
    </div>
</div>
</div>
<nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
    <li><a href="../index.html"><div class="home">HOME</div></a></li>
    <li><a href="" class="noclick"><span>PROGRAMMING</span></a>
          <ul>
        <li><a href="../programs/stem/stem.html">S.T.E.M.</a></li>
        <li><a href="../programs/mentoring/mentoring.html">Mentoring</a></li> <!-- add Cherish the chance section -->
      </ul>
        </li>
    <li><a href="" class="noclick"><span>ABOUT</span></a>
          <ul>
        <li><a href="../about/mission/mission.html">Mission & History</a></li>
        <li><a href="../index.html#mentoringBox">Visionaries</a></li>
      </ul>
        </li>
		 <li><a href="../media/media.html"><div class="home">MEDIA</div></a></li>
	   <li><a href="form.html"><div class="home">CONTACT US</div></a></li>
  </ul>
</nav>
</header>

<?php
// Code that validates and strips all the form data entered
	$name = $email = $phone = $profileLink = $thoughts = "";
	$nameErr = $emailErr = "";
	$thanks = $error = false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$describe = $_POST['describe'];
	
	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
		$error = true;
	} else {
		$name = test_input($_POST["name"]);
	}
	
	 if (empty($_POST["email"])) {
		$emailErr = "Email is required";
		$error = true;
	} else {
		$email = test_input($_POST["email"]);
	}
	
	$phone = test_input($_POST["phone"]);
	$social = $_POST['social'];
	$profileLink = test_input($_POST["profileLink"]);
	$thoughts = test_input($_POST["thoughts"]);
	
	if (!$error) {
		$thanks = true;
  
		$msg = "Someone has requested more info about getting involved with 4th Family! Here's the info they provided /n
		This individual is a $describe /n Name: $name /n Email: $email /n Phone: $phone /n $social Link: $profileLink /n Comments: $thoughts";
  
		$msg = wordwrap($msg,70);
		$sendTo = "info@4thFamily.org";
		$subject = "$name wants to get involved!";
  
		mail($sendTo,$subject,$msg, "");
		
		$name = $email = $phone = $profileLink = $thoughts = "";
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

 <div class="main-content"> 

        <!-- You only need this form and the form-basic.css -->

<div class="form-content">		

        <form class="form-basic" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="form-title-row">
                <?php
					if ($error) {
						echo "<h3>We still require the following information: </h3>";
						echo "<br>";
						echo $nameErr;
						echo "<br>";
						echo $emailErr;
						echo "<br>";
					}
					
					else if ($thanks) {
						echo "<h3>Thanks! Your information has been received and we will be contacting you ASAP!</h3>";
					}
					
					else {
						echo "<h3>Hey! Thanks for your interest in 4th Family! Please fill out this super short form so we know how to connect with you.</h3>";
					}
				?>
            </div>
				
			   <div class="form-row">
                <label>
                    <span>Which Best Describes You</span>
                    <select name="describe">
                        <option>Part of a school system</option>
                        <option>Potential community or organizational partner</option>
                        <option>Youth mentor or volunteer</option>
                        <option>STEM academic</option>
						<option>General ally or supporter</option>
                    </select>
                </label>
            </div>	
				
            <div class="form-row">
                <label>
                    <span>Your name</span>
                    <input type="text" name="name" value = "<?php echo $name;?>">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Email</span>
                    <input type="email" name="email" value = "<?php echo $email;?>">
                </label>
            </div>
			
			  <div class="form-row">
                <label>
                    <span>Phone Number</span>
                     <input type="number" name="phone" maxlength="10" value = "<?php echo $phone;?>">
                </label>
            </div>
			

            <div class="form-row">
                <label>
                    <span>Want us to follow you? Let us know how</span>
                    <select name="social">
                        <option>Facebook</option>
                        <option>LinkedIn</option>
                        <option>Twitter</option>
                        <option>Instagram</option>
                    </select>
                </label>
            </div>
			
			  <div class="form-row">
                <label>
                    <span>Profile Link(s)</span>
                    <textarea name="profileLink"><?php echo $profileLink; ?></textarea>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Let us know what you're thinking about!</span>
                    <textarea name="thoughts"><?php echo $thoughts; ?></textarea>
                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="submit" value="Submit">Send!</button> <!-- send to info@4thFamily.org -->
            </div>

        </form>

    </div>
	</div>
</div>
</body>

</html>
