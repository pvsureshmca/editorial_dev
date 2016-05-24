
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">

					<li><a href="<?php echo base_url();?>bookmark/"><?php echo BOOKMARK_PAGE;?></a>
					</li>
					<li><a class="current" href="<?php echo base_url();?>bookmark/edit/<?php echo $this->uri->segment(3); ?>/"><?php echo BOOKMARK_EDIT;?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
                            <?php echo BOOKMARK_EDIT;?>
                            <span class="tools pull-right"> </span>
					</header>
					<div class="panel-body">
						<div class="form">
						<?php if ($ErrorMessages!='') { ?>
<div class="alert alert-block alert-danger fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
				<i class="fa fa-times"></i>
			</button>
                                <?php echo $ErrorMessages;  ?>
                            </div>
<?php } ?>
							<form class="cmxform form-horizontal " id="bookmark_add"
								method="post" action="<?php echo base_url();?>bookmark/edit/<?php echo $this->uri->segment(3); ?>/" novalidate="novalidate" enctype="multipart/form-data">
								
  
<div class="form-group ">
									<label for="firstname" class="control-label col-lg-2">Title *</label>
									<div class="col-lg-8">
										<input class=" form-control" id="title" name="title"
										 value="<?php echo $details['title'];?>" type="text">
									</div>
								</div>
								
								
<div class="form-group ">
									<label for="firstname" class="control-label col-lg-2">URL *</label>
									<div class="col-lg-8">
										<input class=" form-control" id="url" name="url"
										 value="<?php echo $details['url'];?>" type="text">
									</div>
								</div>

<div class="form-group ">
									<label for="firstname" class="control-label col-lg-2">Description *</label>
									<div class="col-lg-8">

<textarea class="form-control" id="description" name="description" rows="5"><?php echo $details['description'];?> </textarea>
										
									</div>
								</div>


								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-6">
										<button class="btn btn-primary" type="submit">Save</button>
										<button class="btn btn-default" type="button">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>

		<!--mini statistics end-->
	</section>
</section>
<!--main content end-->

