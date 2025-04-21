<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Favicon and touch icons --
        <link rel="shortcut icon" href="form-1/assets/ico/favicon.png">------>
		
		<title>Tourpal | Admin</title>
       
    <!-- CSS -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style4.css'?>">
		
		
</head>
<body >
     <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                   <h3><img src="<?php echo base_url().'assets/images/tourpal.png'?>" class="img-responsive big-im" /></h3>
                    <strong><img src="<?php echo base_url().'assets/images/tp.png'?>" class="img-responsive sm-im" /></strong>
                </div>

                <ul class="list-unstyled components">
                   
                    <li class="active">
                        <a href="<?php echo base_url('admin/'); ?>" >
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a></li>
						<!----<li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Articles
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="<?php //echo base_url(); ?>index.php/artlist" >Article List</a></li>
                            <li><a href="<?php //echo base_url(); ?>index.php/addnew" >Add News</a></li>
                           
                        </ul>
                    </li>-------->
					<li>
                        <a href="<?php echo base_url('admin/attraction'); ?>">
                            <i class="fa fa-code-fork"></i>
                            Attraction Setting
                        </a>
                    </li>
                   <!--- <li>
                        <a href="<?php //echo base_url(); ?>index.php/location">
                            <i class="glyphicon glyphicon-link"></i>
                            Locaion Setting
                        </a>
                    </li>-->
                    
                    <li>
                        <a href="<?php echo base_url('admin/device'); ?>">
                            <i class="fa fa-wifi"></i>
                            Device Setting
                        </a>
                    </li>
					
                </ul>
				<!---<ul class="list-unstyled">
				<li>
                        <a href="<?php echo base_url(); ?>index.php/customer">
                            <i class="fa fa-user"></i>
                            Customers
                        </a>
                    </li>
				</ul>---->
            </nav>
            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="col-xs-12 mp">

                        <div class="col-xs-3">
                            <button type="button" id="sidebarCollapse" class="btn btn-default navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                               <!-- <span>Toggle Sidebar</span>--->
                            </button>
                        </div>

                        <div class="pull-right col-xs-9">
                         
							 <ul class="list-inline nav navbar-nav navbar-right pull-right">
                                    <!--<li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">Add Project</a></li>--->
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                   
									<li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                       
										  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 5px 5px; display: -webkit-inline-box; "><img src="<?php echo base_url().'assets/images/avatar.png'?>" width="40" height="40" class=" img-circle" alt="user">
                                          <b class="caret"></b></a>
                                        <ul class="dropdown-menu list-unstyled">
                                            <li>
                                                <div class="navbar-content">
                                                    <span><?php echo $this->session->userdata('username'); ?></span>
                                                    <!--<p class="text-muted small">
                                                        me@jskrishna.com
                                                    </p>-->
                                                    <div class="divider">
                                                    </div>
                                                    <p><i class="fa fa-sign-out" aria-hidden="true"></i><a href="<?php echo base_url('home/logout') ?>">Logout</a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </nav>
			<div id="sub-content">
			<!--1st panel--->
			<div class="row">
			<div class="col-xs-12">
      <div align="center" class="">

<!---<div class="col-md-4 brand">
<img  src="<?php echo base_url().'assets/images/hotelmayas.png'?>" class="img-responsive" />
</div>---->

          <h1>TOURPAL ADMIN DASHBOARD <br>&nbsp;&nbsp;</h2>
          
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
			</div>
			<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-duplicate"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Attractions</span>
              <span class="info-box-number"><?php
            if($getadmin != ''){
                foreach ($getadmin as $value) { 
                echo $value->tleid;
              } 
            } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-wifi"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Devices</span>
              <span class="info-box-number"><?php
            if($getdevice != ''){
                foreach ($getdevice as $device) { 
                echo $device->devid;
              } 
            } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="glyphicon glyphicon-link"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Location</span>
              <span class="info-box-number"><?php
            if($getlocate != ''){
                foreach ($getlocate as $getlot) { 
                echo $getlot->locid;
              } 
            } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-teal"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Today</span>
              <span class="info-box-number" id="time"> </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
	  <!---//1st panel--->
			</div>
			
			<!---wrapper---->
        </div>

<!---footer scripts--------->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/custom.js'?>"></script>
       
		 </body>
</html>