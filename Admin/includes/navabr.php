<?php session_start(); ?>

<aside class="menu-sidebar d-none d-lg-block"> 
            <div class="logo">
                <a href="#">
                    <img src="images/icon/favicon.png" alt="Cool Admin" width="50px"/><h3>CAKKERY</h3>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="home.php">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <!--<li>
                            <a href="admin_profile.php">
                                <i class="fa fa-user-secret"></i>Admin Profile</a>
                        </li>-->
                        <li>
                            <a href="users.php">
                                <i class="fas fa-users"></i>Users</a>
                        </li>
                        <!--<li>
                            <a href="users.php">
                                <i class="fas fa-users"></i>Users</a>
                        </li>-->
                        <li>
                            <a href="products.php">
                                <i class="fas fa-table"></i>Products</a>
                        </li>
                        <li>
                            <a href="orders.php">
                                <i class="fa fa-shopping-cart"></i>Orders</a>
                        </li>
                        <li>
                            <a href="feedback.php">
                                <i class="fa fa-comments"></i>User-Reviews</a>
                        </li>                        
                        <li>
                            <a href="logout.php">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        