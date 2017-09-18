<?php  defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title><?php echo $title;?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/skins/skin-blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/blue.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.min.css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/icheck.min.js"></script>
   	<script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
   	<script src="<?php echo base_url();?>assets/js/Chart.min.js"></script>
   	<script src="<?php echo base_url();?>assets/js/fastclick/fastclick.js"></script>
  <? 	$session = $this->session->userdata('logged_in'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="/toms" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>OMS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>T</b>OMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#">
              <img src="<?php echo base_url();?>assets/images/avatar2.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><? echo $session['loginname'] ?></span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url();?>cpanel/logout" alt="Sign Out" title="Sign Out" ><i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="/toms">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php 
			//$session = $this->session->userdata('logged_in');
			$groupId = $session['groupId'];
			
			//$tt = str_replace("/","",$_SERVER['REQUEST_URI']);
			$multilevel = $this->groupuser_model->all_menu($parent=0,$groupId);
			//recursive menu
			function print_recursive_menu($data)
			{
				$str = "";
				$tt = str_replace("/toms/","",$_SERVER['REQUEST_URI']);
				foreach($data as $list)
				{
					#echo $tt."--".$list['moduleUrl']."<br>";
					if($tt == $list['moduleUrl']) $str .="<li class='active'>";
					else $str .="<li class=''>";
					$str .= "<a href=".base_url()."".$list['moduleUrl'].">";
					$str .= "<i class='fa fa-circle-o'></i> ".$list['menuName']."</a>";
					$subchild = print_recursive_menu($list['parentId']);
					if($subchild != '')
						$str .= "<ul class=treeview-menu>".$subchild."</ul>";
					$str .= "</li>";
				}
				return $str;
			}
			foreach ($multilevel as $data)
			 {
				 echo '<li class="treeview active">';
				 echo '<a href="#"><i class="fa fa-bookmark"></i>';
				 echo '<span>'.$data['menuName'].'</span>';
				 echo '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>';
				 echo '<ul class="treeview-menu">';
				 echo print_recursive_menu($data['parentId']);
				 echo '</ul>';
			 }
		?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	  <?php echo $contents; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 TOMS</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url(); ?>assets/js/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
</body>
</html>

