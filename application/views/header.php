<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ThemeBucket">
<link rel="shortcut icon"
	href="<?php echo base_url(); ?>assets/images/favicon.png">
<title><?php echo SITE_TITLE." ".$site_title; ?></title>
<!--Core CSS -->
<link href="<?php echo base_url(); ?>assets/bs3/css/bootstrap.min.css"
	rel="stylesheet">
<link
	href="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.css"
	rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-reset.css"
	rel="stylesheet">
<link
	href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css"
	rel="stylesheet">
<link
	href="<?php echo base_url(); ?>assets/js/jvector-map/jquery-jvectormap-1.2.2.css"
	rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/clndr.css"
	rel="stylesheet">
<!--clock css-->
<link href="<?php echo base_url(); ?>assets/js/css3clock/css/style.css"
	rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery-multi-select/css/multi-select.css" />

 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/tag_it/tagit.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/tag_it/tagit.ui-zendesk.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select2/select2.css" />


<!--dynamic table-->
<link
	href="<?php echo base_url(); ?>assets/js/advanced-datatable/css/demo_page.css"
	rel="stylesheet" />
<link
	href="<?php echo base_url(); ?>assets/js/advanced-datatable/css/demo_table.css"
	rel="stylesheet" />
<link rel="stylesheet"
	href="<?php echo base_url(); ?>assets/js/data-tables/DT_bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/fuelux/css/tree-style.css" />
<!--Morris Chart CSS -->
<link rel="stylesheet"
	href="<?php echo base_url(); ?>assets/js/morris-chart/morris.css">
<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>assets/css/style.css"
	rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style-responsive.css"
	rel="stylesheet" />

<!-- date picker -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-datepicker/css/datepicker.css" />
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />


<?php if($this->uri->segment(2)=="photos"){  ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />

<?php } ?>

   
<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<section id="container">
		<!--header start-->
		<header class="header fixed-top clearfix">
			<!--logo start-->
			<div class="brand">

				<a href="<?php echo base_url();?>dashboard/" class="logo">
        Editorial
    </a>
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars"></div>
				</div>
			</div>
			<!--logo end-->

			<div class="nav notify-row" id="top_menu">
				
			</div>
			<div class="top-nav clearfix">
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					
					<!-- user login dropdown start-->
					<li class="dropdown"><a data-toggle="dropdown"
						class="dropdown-toggle" href="#"> 
                                                    <!-- <img alt=""
							src="<?php echo base_url(); ?>assets/images/avatar1_small.jpg"> <span
							class="username"> --> <?php echo ucfirst($this->session->userdata('user_name')); ?></span>
							<b class="caret"></b>
					</a>
						<ul class="dropdown-menu extended logout">

							<li><a href="<?php echo base_url();?>dashboard/logout"><i
									class="fa fa-key"></i> Log Out</a></li>
						</ul></li>
					<!-- user login dropdown end -->
					
				</ul>
				<!--search & user info end-->
			</div>
		</header>
		<!--header end-->
		<!--sidebar start-->
		<aside>
			<div id="sidebar" class="nav-collapse">
				<!-- sidebar menu start-->
				<div class="leftside-navigation">
					<ul class="sidebar-menu" id="nav-accordion">
						<li><a
							class="<?php if($this->uri->segment(1)=="dashboard"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>dashboard/"> <i
								class="fa fa-dashboard"></i> <span>Dashboard</span>
						</a></li>
                                                  <li><a
							class="<?php if($this->uri->segment(1)=="article"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>article/"> <i class="fa fa-book"></i>
								<span>Articles</span>
						</a></li>
                                                  <li><a
							class="<?php if($this->uri->segment(1)=="article_comment"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>article_comment/"> <i class="fa fa-comment"></i>
								<span>Article Comments</span>
						</a></li>

                                                 <li><a
							class="<?php if($this->uri->segment(1)=="bookmark"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>bookmark/"> <i class="fa fa-bookmark"></i>
								<span>Bookmark</span>
						</a></li>

                                                <li><a
							class="<?php if($this->uri->segment(1)=="tags"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>tags/"> <i class="fa fa-tags"></i>
								<span>Tags</span>
						</a></li>
						 <?php if($this->session->userdata('role_id')=="1"){ ?>
						<li><a
							class="<?php if($this->uri->segment(1)=="category"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>category/"> <i class="fa fa-tasks"></i>
								<span>Category</span>
						</a></li>
						<li><a
							class="<?php if($this->uri->segment(1)=="sub_category"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>sub_category/"> <i class="fa fa-tasks"></i>
								<span>Sub Category</span>
						</a></li>
                                             
						<li><a
							class="<?php if($this->uri->segment(1)=="user"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>user/"> <i class="fa fa-user"></i>
								<span>User</span>
						</a></li>

                                                 <li><a
							class="<?php if($this->uri->segment(1)=="news_paper"){ echo "active" ;} ?>"
							href="<?php echo base_url();?>news_paper/"> <i class="fa fa-book"></i>
								<span>Newspaper</span>
						</a></li> 
						<?php } ?>

                                              <li class="sub-menu"><a
							class="<?php if($this->uri->segment(1)=="photo_gallery"){ echo "active" ;} ?>"
							href="javascript:;"> <i class="fa fa-picture-o"></i> <span>Photo Gallery</span>
						</a>
							<ul class="sub">
								<li	class="<?php if($this->uri->segment(2)=="photos"){ echo "active" ;} ?>"><a
								
									href="<?php echo base_url();?>photo_gallery/photos/">Photos</a></li>
								<li	class="<?php if($this->uri->segment(2)=="category"){ echo "active" ;} ?>"><a
								
									href="<?php echo base_url();?>photo_gallery/category/">Category</a></li>
								<li	class="<?php if($this->uri->segment(2)=="sub_category"){ echo "active" ;} ?>"><a
								
									href="<?php echo base_url();?>photo_gallery/sub_category/">Sub
										Category</a></li>
								<li	class="<?php if($this->uri->segment(2)=="sub_two_category"){ echo "active" ;} ?>"><a
								
									href="<?php echo base_url();?>photo_gallery/sub_two_category/">Sub Level Two Category</a></li>

                                                      <li	class="<?php if($this->uri->segment(2)=="tags"){ echo "active" ;} ?>"><a
								
									href="<?php echo base_url();?>photo_gallery/tags/">Tags</a></li>


							</ul></li>




					</ul>
				</div>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
