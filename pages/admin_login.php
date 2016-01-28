<?php
session_start();
if(isset($_SESSION['manager'])){
	header("location:index.php");
	exit();
}

if(isset($_POST['username']) && isset($_POST['password'])) {

    $adminUser = preg_replace('#[^A-Za-z0-9]#i', "", $_POST['username']);
    $password = preg_replace('#[^A-Za-z0-9]#i', "", $_POST['password']);

    include '../scripts/db-connect.php';

    $query = "SELECT id FROM admin WHERE username='$adminUser' AND password='$password'";

$sql = mysqli_query($connection, $query);


$existCount = mysqli_num_rows($sql);

if ($existCount == 1) {
    $row = mysqli_fetch_assoc($sql);
    $id = $row["id"];
    $_SESSION['id'] = $id;

    $_SESSION['manager'] = $adminUser;
    $_SESSION['password'] = $password;
    header("location: index.php");
    exit();

} else {
    echo "User Not Found, try again";
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