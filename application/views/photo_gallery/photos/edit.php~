
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">

					<li><a href="<?php echo base_url();?>photo_gallery/photos/"><?php echo PHOTOS_PAGE;?></a>
					</li>
					<li><a class="current" href="<?php echo base_url();?>photo_gallery/photos/edit/<?php echo $this->uri->segment(4); ?>/"><?php echo PHOTOS_EDIT;?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
                            <?php echo PHOTOS_EDIT;?>
                            <span class="tools pull-right"> <button class="btn btn-primary"
								onclick="location.href ='<?php echo base_url();?>photo_gallery/photos/view/<?php echo $this->uri->segment(4); ?>/'">View</button></span>
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
							<form class="cmxform form-horizontal " id="article_edit"
								method="post" action="<?php echo base_url();?>photo_gallery/photos/edit/<?php echo $this->uri->segment(4); ?>/" novalidate="novalidate" enctype="multipart/form-data">
								
  
<div class="form-group ">
									<label for="firstname" class="control-label col-lg-2">Name *</label>
									<div class="col-lg-8">
										<input class=" form-control" id="name" name="name"
										 value="<?php echo $details['name'];?>" type="text">
									</div>
								</div>
								
								<div class="form-group ">
									<label for="firstname" class="control-label col-lg-2">Photo *</label>
									<div class="col-lg-8">
										<input class="form-control" id="image" name="image"  type="file" 
										accept="image/jpg, image/JPG,image/JPEG, image/jpeg, image/png, image/PNG, image/GIF, image/gif">
									</div>
								</div>

                                             <div class="form-group ">
									<label for="firstname" class="control-label col-lg-2">Event *</label>
									<div class="col-lg-8">
										<input class=" form-control" id="event" name="event"
										 value="<?php echo $details['event'];?>" type="text">
									</div>
								</div>

								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Category *</label>
									
									<div class="col-lg-8" id="Category">
										
										

											
										<?php if(sizeof($cat_list)>0){	foreach ( $cat_list as $cat_val ) {?> <div class="col-lg-4">

<input class="" id="cat_id" name="cat_id[]" <?php if(in_array($cat_val['id'], $cat_set)) {?> checked="checked" <?php }?> value="<?php echo $cat_val['id'];?>" type="checkbox"> <?php echo $cat_val['name']; ?>

</div>
<?php  }}?>

										
									</div>
								</div>

								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Sub Category </label>
									
									<div class="col-lg-8">
										
										
										
										

											
										<?php if(sizeof($sub_cat_list)>0){	foreach ( $sub_cat_list as $sub_cat_val ) {?> <div class="col-lg-4">

<input class="" id="sub_cat_id" name="sub_cat_id[]" <?php if(in_array($sub_cat_val['id'], $sub_cat_set)) {?> checked="checked" <?php }?> value="<?php echo $sub_cat_val['id'];?>" type="checkbox"> <?php echo $sub_cat_val['name']; ?>

</div>
<?php  }}?>

									</div>
								</div>
								
								


								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Sub Level two Category </label>
									
									<div class="col-lg-8">
										
										
										
										

											
										<?php if(sizeof($sub_two_cat_list)>0){	foreach ( $sub_two_cat_list as $sub_two_cat_val ) {?> <div class="col-lg-4">

<input class="" id="sub_two_cat_id" name="sub_two_cat_id[]" <?php if(in_array($sub_two_cat_val['id'], $sub_two_cat_set)) {?> checked="checked" <?php }?> value="<?php echo $sub_two_cat_val['id'];?>" type="checkbox"> <?php echo $sub_two_cat_val['name']; ?>

</div>
<?php  }}?>

									</div>
								</div>

                                                          


<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Description</label>
									
									<div class="col-lg-8">

                                                                       <textarea class="form-control" id="description" name="description" rows="5"><?php echo trim($details['description']);?></textarea>
										
										
									</div>
								</div>


<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Tags</label>
									
									<div class="col-lg-8">

                                                                       <ul id="allowSpacesTags">
                                                        <?php if(sizeof($tags_set)>0){	foreach ( $tags_set as $tags_val ) {?>
											<li> <?php echo $tags_val['name']; ?></li>
                                                         <?php } }?>
                                                                            </ul>
										
										
									</div>
								</div>



								<div class="form-group ">
									<label for="Status" class="control-label col-lg-2">Status *</label>
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

