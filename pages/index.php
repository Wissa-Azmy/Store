<?php
require '../scripts/db-connect.php';
require 'session_validation.php';
?>

<!DOCTYPE html>
<html>
	<head>
        <link rel= "stylesheet" href="../styles/styles.css" type="text/css" />

        <title>Store Admin Page</title>
	</head>
	<body>
    <?php include 'header.php';  ?>
    <div align="right">
        <a href="admin_logout.php" class="menu">Log out</a>
    </div>
		<div align="center" id="main">
			<?php echo "Welcome ". $adminUser; ?>
            <br/>
            <a href="inventory_list.php" class="menu">Inventory</a>
            <br/>
            <a href="user_list.php" class="menu">Users</a>

        </div>


    <?php include 'footer.php';  ?>
    </body>
</html>