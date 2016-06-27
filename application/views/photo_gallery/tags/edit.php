
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">

					<li><a href="<?php echo base_url();?>photo_gallery/tags/"><?php echo TAGS_PAGE;?></a>
					</li>
					<li><a class="current" href="<?php echo base_url();?>photo_gallery/tags/edit/<?php echo $this->uri->segment(3); ?>/"><?php echo TAGS_EDIT;?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
                            <?php echo TAGS_EDIT;?>
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
							<form class="cmxform form-horizontal " id="tags_add"
								method="post" action="<?php echo base_url();?>photo_gallery/tags/edit/<?php echo $this->uri->segment(4); ?>/" novalidate="novalidate" enctype="multipart/form-data">
								<div class="form-group ">
									<label for="firstname" class="control-label col-lg-3">Name *</label>
									<div class="col-lg-6">
										<input class=" form-control" id="name" name="name"
										 value="<?php echo $details['name'];?>" type="text">
									</div>
								</div>
								<div class="form-group ">
									<label for="Status" class="control-label col-lg-3">Status *</label>
									<div class="col-lg-8">
<input  id="status" name="status" value="1" checked="checked" type="radio"> Active &nbsp;&nbsp;
<input  id="status" name="status" value="0" <?php if($details['status']=="0"){ ?> checked="checked" <?php } ?> type="radio"> Inactive
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

