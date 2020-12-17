<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/signin.css">
</head>
<body>
	<form class="form-signin" method="post" action="<?php echo site_url('CUser/cek'); ?>">
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text"  class="form-control" placeholder="Username" required autofocus name="username">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted center"> Service Motor&copy; 2018</p>
      </form>

</body>
</html>