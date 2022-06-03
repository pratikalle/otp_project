<h1>Welcome, <?php echo $_SESSION['uname']; ?></h1>
<a href="<?php echo base_url('admin/login/logout'); ?>">Logout</a><br>
<a href="<?php echo base_url('admin/dashboard/view_users'); ?>">Show all Users</a>