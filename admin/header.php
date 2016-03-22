
<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            <!--<span class="glyphicon glyphicon-apple"></span>-->

                </button>
                <div class="navbar-brand">Admin Menu</div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?php echo $home;?> ><a href="index.php" class="">Home</a></li>
                    <li <?php echo $inventory;?> ><a href="inventory_list.php" class="">Inventory</a></li>
                    <li <?php echo $users;?> ><a href="user_list.php" class="">Users</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"><?php echo "<b>". $adminUser . "</b>"; ?>
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" rel="Profile">Profile</a></li>
                            <li><a href="admin_logout.php" rel="Log out">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>