<?php
if (session_start())
{
	if ($_GET['submit'] === 'OK' && $_GET['login'] && $_GET['passwd'])
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
}
else
	echo "Unable to start session.";
?>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="rush.css">
    <style type="text/css">
        body{ font: 14px; }
    </style>
</head>
<body>
    <div>
		<h2>Login</h2>
		<h1>Welcome to the Jawa Junkyard!</h1>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span><?php echo $username_err; ?></span>
            </div>    
            <div class="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password">
                <span><?php echo $password_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>