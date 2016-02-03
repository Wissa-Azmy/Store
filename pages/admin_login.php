<?php
session_start();
if(isset($_SESSION['manager'])){
	header("location:index.php");
	exit();
}

require '../scripts/db-connect.php';

if(isset($_POST['username']) && isset($_POST['password'])) {

    $adminUser = preg_replace('#[^A-Za-z0-9]#i', "", $_POST['username']);
    $password = preg_replace('#[^A-Za-z0-9]#i', "", $_POST['password']);

    $query = "SELECT id FROM admin WHERE username='$adminUser' AND password='$password'";

$sql = $db->query($query);

$existCount = $db->num_rows($sql);

if ($existCount == 1) {
    $row = $db->fetch_assoc($sql);
    $id = $row["id"];
    $_SESSION['id'] = $id;

    $_SESSION['manager'] = $adminUser;
    $_SESSION['password'] = $password;
    header("location: index.php");
    exit();

} else {
    echo 'User Not Found, <a href="admin_login.php">try again</a>';
    exit();
}
}
?>


<!DOCTYPE html>
<html>
	<head>
	<link rel= "stylesheet" href="../styles/styles.css" type="text/css" />
		<title>Admin Login</title>
	</head>
	<body>
    <?php include 'header.php';  ?>

    <div align="center" id="main">
			 <div class="form">
            <form action="" method="post" >
                <h1>Login Page</h1>

                    <input type="text" name="username" placeholder="User Name">
                    <br />
                    <input type="password" name="password" placeholder="Password" >
                     <br />
                    <button type="submit" class="button">Log In</button>
            </form>
            </div>
		</div>

    <?php include 'footer.php';  ?>
    </body>
</html>