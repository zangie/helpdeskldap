<?php
	error_reporting(1);
	require_once "functions.php";
	session_start();
date_default_timezone_set('Europe/Athens');
?>
<!DOCTYPE html>
<html lang="en">
<head>





  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HELP DESK 
ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="    width:40%;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h3><b>HELP DESK</b><br>ΔΙΕΥΘΥΝΣΗΣ ΗΛΕΚΤΡΟΝΙΚΗΣ ΔΙΑΚΥΒΕΡΝΗΣΗΣ</h3>
    </div>
    <div class="card-body">
   
		<?php if(empty($_POST['username']) || empty($_POST['password'])) { ?>
		   <h4 class="login-box-msg">Παρακαλούμε συμπληρώστε τα στοιχεία εισόδου σας στα Windows</h4>
		<form method="POST" action="" name="login"> 
			<input type="text" name="username" placeholder="username" class="form-control" required>
			<input type="password" name="password" placeholder="password" class="form-control" id="id_password" required >
			  <i class="far fa-eye" id="togglePassword" style="float:right;    margin-top: -26px;    margin-right: 11px; cursor: pointer;"></i>
			  <p id="text" >ΠΡΟΕΙΔΟΠΟΙΗΣΗ! Το Caps lock είναι ΕΝΕΡΓΟ.</p>
			<input type="submit" class="btn btn-default btn-block"  value="Είσοδος">
			
		</form>
	
		<?php 
	
		} else {	echo FindUser();
	
	
			?>
										<section name="info">
										<?php  
									//	ECHO ADUsersCredits();
										//echo RetrieveData (); ?>
										
											
										<div class="row">
									
	<h5 style="color:#007bff;font-weight: 600;">	Παρακαλούμε επιβεβαιώστε την ορθότητα των στοιχείων σας: Είναι σωστά;</h5></div>
						
							<div class="row">
							<div class="col-sm-4"></div>
					<div class="col-sm-3">
						<form action="validation.php" method="post">
						<button type="submit" name="validated" class="btn btn-success">NAI</button>
				
					</form>
							</div>	
							<div class="col-sm-4">
							<form action="validation.php" method="post">
					<button type="submit" name="notvalidated" class="btn btn-danger">ΟΧΙ</button>
				
					
					</form>	</div>
										</div>
										</section>
										
						<?php			
								   }
								   
								
                    ?>
      <!-- /.social-auth-links -->


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</div>
  <section>
  <div style="padding-top: 100px;    padding-left: 116px;">
<div class="row">
<a href="dist/Users_Manual_Vlaves.pdf" target="_blank">
	<img src="dist/img/downloadmanual.png" alt="Οδηγίες χρήσης" style="width:66%">
	</div>
	<div class="row">
	<h2 style="text-align:center">Οδηγίες χρήσης</h2></a>
</div>
	</div>
</section>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
    document.getElementById("refresh").onclick = function () {
        name.href = "login.php";
    };
</script>
<script>
const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<script type="text/javascript">
    document.getElementById("validated").onclick = function () {
        name.href = "profile.php";
    };
</script>
<script>
var input = document.getElementById("id_password");
var text = document.getElementById("text");
input.addEventListener("keyup", function(event) {

if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
  } else {
    text.style.display = "none"
  }
});
</script>
<style>
#text {display:none;color:red}
</style>
</body>
</html>
