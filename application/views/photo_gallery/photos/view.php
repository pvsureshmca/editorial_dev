
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">

					<li><a href="<?php echo base_url();?>photo_gallery/photos/"><?php echo PHOTOS_PAGE;?></a>
					</li>
					<li><a class="current" href="<?php echo base_url();?>photo_gallery/photos/view/<?php echo $this->uri->segment(4); ?>/"><?php echo PHOTOS_VIEW;?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"><?php echo PHOTOS_VIEW;?>
                            <span class="tools pull-right"><button class="btn btn-primary"
								onclick="location.href ='<?php echo base_url();?>photo_gallery/photos/edit/<?php echo $this->uri->segment(4); ?>/'">Edit</button> </span>
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
                            
							<form class="cmxform form-horizontal" >
								
  
<div class="form-group "  style="pading-top:10px;">
									<label for="firstname" class="control-label col-lg-2">Name :</label>
									<div class="col-lg-6" >
										<p  class="form-control"><?php echo $details['name'];?></p>
									</div>
								</div>


<div class="form-group "  style="pading-top:10px;">
									<label for="firstname" class="control-label col-lg-2">Event :</label>
									<div class="col-lg-6" >
										<p  class="form-control"><?php echo $details['event'];?></p>
									</div>
								</div>

<div class="form-group "  style="pading-top:10px;">
									<label for="firstname" class="control-label col-lg-2">Photo :</label>
									<div class="col-lg-6" >
										<?php if($details['file_name']){ ?>
<a class="fancybox-button" rel="fancybox-button"  rel="gallery1" href="<?php echo base_url().PRODUCT_IMAGE_PATH.$details['file_name']; ?>" title="<?php echo $details['name']; ?>">
<img alt=""  src="<?php echo base_url().PRODUCT_THUMB_IMAGE_PATH.$details['file_name']; ?>"/></a> <?php } ?>
									</div>
								</div>

<div class="form-group "  style="pading-top:10px;">
									<label for="firstname" class="control-label col-lg-2">Category :</label>
									<div class="col-lg-8" >
                                                
                                                                              <?php if(sizeof($catset)>0){	foreach ( $catset as $cat_val ) {?>
											 <p style="color: #1D1616;"> => <?php echo $cat_val['name']; ?> </p>

<?php if(sizeof($cat_val['sub_cat'])>0){	foreach ( $cat_val['sub_cat'] as $sub_val ) {?>
											 <p  style="margin-left: 20px;
color: #1D1616;"> => <?php echo $sub_val['name']; ?> </p>


<?php if(sizeof($sub_val['sub_two_cat'])>0){	foreach ( $sub_val['sub_two_cat'] as $sub_two ) {?>
											 <p  style="margin-left: 40px;"> => <?php echo $sub_two['name']; ?> </p>



                                                         <?php } }?>   



                                                         <?php } }?>   

                                                         <?php } }?>   
										
									</div>
								</div>

<div class="form-group "  style="pading-top:10px;">
									<label for="firstname" class="control-label col-lg-2">Description :</label>
									<div class="col-lg-6" >
										<textarea class="form-control" id="description" name="description" rows="10" readonly="readonly"><?php echo trim($details['description']); ?></textarea>
									</div>
								</div>
								
								

                                                          <div class="form-group ">
									<label for="Status" class="control-label col-lg-2">Status :</label>
									<div class="col-lg-6"><p  class="form-control"> 
<?php if($details['status']=="1"){ echo "Active"; } else { echo "inactive";  } ?> 
									</p></div>
								</div>
                                                 <div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Tags :</label>
									
									<div class="col-lg-8">

                                                                      
                                                        <?php if(sizeof($tags_set)>0){	foreach ( $tags_set as $tags_val ) {?>
											<div  class="col-lg-3">  <p class="form-control"> <?php echo $tags_val['name']; ?> </p></div>
                                                         <?php } }?> 
                                                                            
										
										
									</div>
								</div>

<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Created :</label>
									
									<div class="col-lg-6"><p  class="form-control"> 
										
										<?php
                                                    echo date('d/m/Y H:i:A', strtotime($details['created_on']));
                                                    ?></p>
									</div>
								</div>

<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Modified :</label>
									
									<div class="col-lg-6"><p  class="form-control"> 
										
										 <?php
                                                    echo date('d/m/Y H:i:A', strtotime($details['updated_on']));
                                                    ?>
									</div>
								</div>


<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Posted By :</label>
									
									<div class="col-lg-6"><p  class="form-control"> 
										
										 <?php echo $details['user_name']; ?></p>
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

