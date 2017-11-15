<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SMS Masking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">SMS Masking with PHP</h1>
				<form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Sender Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sender" name="sender" placeholder="Your Name">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Number</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="number" name="number" placeholder="+6281311111111">
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<p><?php
if($_SERVER['REQUEST_METHOD']=='POST') {
 
    include('smsMasking.class.php');
    $smsMasking = new smsMasking();
    $send=$smsMasking->send($_POST['sender'], $_POST['number'], $_POST['message']);
    if($send['status']==false) {
        echo '<center><b><font color="darkred">'.$send['error'].'</font></b></center>';
    } else {
        echo '<center><b><font color="darkgreen">'.$send['success'].'</font></b></center>';
    }
 
}
?></p></body>
</html>