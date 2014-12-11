<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Travel With Carnet</title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />

<!-- page specific plugin styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorpicker.css" />

<!-- text fonts -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" id="main-ace-style" />

<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-part2.min.css" />
		<![endif]-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />

<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" />
		<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<body class="no-skin">
<div id="navbar" class="navbar navbar-default"> 
  <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
  <div class="navbar-container" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler"> <span class="sr-only">Toggle sidebar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div class="navbar-header pull-left"> <a href="#" class="navbar-brand"> <small> Travel With Carnet </small> </a> </div>
  </div>
  <!-- /.navbar-container --> 
</div>
<div class="main-container" id="main-container">
<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
<div id="sidebar" class="sidebar                  responsive"> 
  <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
      <button class="btn btn-success"> <i class="ace-icon fa fa-signal"></i> </button>
      <button class="btn btn-info"> <i class="ace-icon fa fa-pencil"></i> </button>
      <button class="btn btn-warning"> <i class="ace-icon fa fa-users"></i> </button>
      <button class="btn btn-danger"> <i class="ace-icon fa fa-cogs"></i> </button>
    </div>
    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini"> <span class="btn btn-success"></span> <span class="btn btn-info"></span> <span class="btn btn-warning"></span> <span class="btn btn-danger"></span> </div>
  </div>
  <!-- /.sidebar-shortcuts -->  
  <ul class="nav nav-list">
    <li class="active"> <a href="index.php"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span> </a> <b class="arrow"></b> </li>
    <li class=""> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-desktop"></i> <span class="menu-text"> Layer </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
      <ul class="submenu">
        <li class=""> <a href="index.php" class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i> Layer <b class="arrow fa fa-angle-down"></b> </a>
      </ul>
    </li>
  </ul>
  </li>
  </ul>
  </li>
  </ul>
  <!-- /.nav-list -->  
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"> <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i> </div>
  <script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script> 
</div>
<div class="main-content">
  <div class="breadcrumbs" id="breadcrumbs"> 
    <script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>
    <ul class="breadcrumb">
      <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="#">Home</a> </li>
      <li class="active">Dashboard</li>
    </ul>
    <!-- /.breadcrumb -->    
    <div class="nav-search" id="nav-search">
      <form class="form-search">
        <span class="input-icon">
        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
        <i class="ace-icon fa fa-search nav-search-icon"></i> </span>
      </form>
    </div>
    <!-- /.nav-search --> 
  </div>
  <div class="page-content"> 