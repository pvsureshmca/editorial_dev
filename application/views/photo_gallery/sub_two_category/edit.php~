
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">

					<li><a href="<?php echo base_url();?>photo_gallery/sub_two_category/"><?php echo SUBTWOCAT_PAGE;?></a>
					</li>
					<li><a class="current" href="<?php echo base_url();?>photo_gallery/sub_two_category/edit/<?php echo $this->uri->segment(4); ?>/"><?php echo SUBTWOCAT_EDIT;?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
                            <?php echo SUBTWOCAT_EDIT;?>
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
							<form class="cmxform form-horizontal " id="sub_two_category_add"
								method="post" action="<?php echo base_url();?>photo_gallery/sub_two_category/edit/<?php echo $this->uri->segment(4); ?>/" novalidate="novalidate" enctype="multipart/form-data">
								
								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-3">Category *</label>
									
									<div class="col-lg-6">
										
										<select  class="form-control" style="width: 100%" id="cat_id" name="cat_id"  onChange="GoToPrintJSONAjaxData('sub_two_category/ajax_list', 'SubCat',this.value,'sub_cat_id','')" >

											<option value="">Select Category</option>
										<?php if(sizeof($category_list)>0){	foreach ( $category_list as $detail ) {?>
											<option value="<?php echo $detail['id']; ?>"  <?php if($details['cat_id']==$detail['id']){?> selected="selected" <?php }?>><?php echo $detail['name']; ?></option>
                                        <?php } }?>

										</select>
									</div>
								</div>
                                                                <div class="form-group ">
									<label for="lastname" class="control-label col-lg-3">Sub Category *</label>
									
									<div class="col-lg-6">
										
										<select  class="form-control" style="width: 100%" id="sub_cat_id" name="sub_cat_id" >

											<option value="">Select sub Category</option>
										

										</select>
									</div>
								</div>
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

