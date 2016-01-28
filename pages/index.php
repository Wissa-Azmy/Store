<?php
require 'session_validation.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Store Admin Page</title>
	</head>
	<body>
    <?php include 'header.php';  ?>

		<div align="center" id="main">
			<?php echo "Welcome ". $adminUser; ?>
            <br/>
            <a href="inventory_list.php" rel="inventroy">Inventory List</a>
		</div>

    <?php include 'footer.php';  ?>
    </body>
</html>