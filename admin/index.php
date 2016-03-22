<?php
require '../scripts/db-connect.php';
require 'session_validation.php';
?>

<!DOCTYPE html>
<html>
	<head>
        <link rel= "stylesheet" href="../styles/styles.css" type="text/css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <title>Store Admin Page</title>
	</head>
	<body>
    <?php
    $home = 'class="active"';
    $inventory = '';
    $users = '';
    include 'header.php';
    ?>

		<div align="center" id="main">
			<?php echo "Welcome <b>". $adminUser . "</b>"; ?>
            <br/>
            <a href="inventory_list.php" class="menu">Inventory</a>&nbsp;
            <a href="user_list.php" class="menu">Users</a>

        </div>


    <?php include 'footer.php';  ?>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../scripts/main.js"></script>

    </body>
</html>