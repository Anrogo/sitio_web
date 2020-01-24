<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Index antonio r.g.</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Welcome to Autos Database</h1>
<p><strong>Note:</strong> This sample code is only
partially done and serves only as a starting point for the assignment.
</p>
<p>
<a href="login.php">Please Log In</a>
</p>
<p>
Attempt to go to 
<a href="autos.php">autos.php</a> without logging in - it should fail with an error message.
</div>
</body>
<?php
ob_end_flush();
?>
