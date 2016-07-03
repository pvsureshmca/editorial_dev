<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">
					
					<li><a class="current" href="<?php echo base_url();?>photo_gallery/photos/"><?php echo PHOTOS_PAGE;?></a>
					</li>
				</ul>
			</div>
		</div>

<?php if ($this->session->flashdata('SucMessage')!='') { ?>
<div class="alert alert-success alert-block fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
				<i class="fa fa-times"></i>
			</button>
			<h4>
				<i class="icon-ok-sign"></i>

			</h4>
			<p><?php echo $this->session->flashdata('SucMessage');  ?></p>
		</div>

<?php } ?>
<?php if ($this->session->flashdata('ErrorMessage')!='') { ?>
<div class="alert alert-block alert-danger fade in">
			<button data-dismiss="alert" class="close close-sm" type="button">
				<i class="fa fa-times"></i>
			</button>
                                <?php echo $this->session->flashdata('ErrorMessage');  ?>
                            </div>
<?php } ?>

<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading">
                        <?php echo PHOTOS_LIST;?>
                        <span class="tools pull-right">
							<button class="btn btn-primary"
								onclick="location.href ='<?php echo base_url(); ?>photo_gallery/photos/add'">Add</button>

						</span>
					</header>
					<div class="panel-body">

						<div class="adv-table">
							<div id="dynamic-table_wrapper"
								class="dataTables_wrapper form-inline" role="grid">
<form class="cmxform form-horizontal " method="post" action="<?php echo base_url();?>photo_gallery/photos/index/" novalidate="novalidate" enctype="multipart/form-data">
                                
          


                                <div class="col-md-6" style="padding-bottom: 16px;">
                                    
                                    <div class="input-group input-large">
                                        <span class="input-group-addon">Category : </span>
                                        <select class="form-control" style="width: 380px;" name="cat_id" id="cat_id" onChange="GoToPrintJSONAjaxData('photo_gallery/photos/ajax_list','SubCat',this.value,'sub_cat_id','')" >
                                    <option value="">Select Category</option>
                                    <?php foreach ($cat_list as $cat) { ?>
                                        <option value="<?php echo $cat['id']; ?>"
                                                <?php if ($post_data!=""){ if($cat['id'] == $post_data['cat_id']) { ?> selected = "selected" <?php } } ?>
                                                > <?php echo $cat['name']; ?></option>
                                            <?php } ?>
                                </select>

                                    </div>
                                   
                                </div> 

                                 <div class="col-md-6" style="padding-bottom: 16px;">
                                    
                                    <div class="input-group input-large">
                                        <span class="input-group-addon">Sub Category : </span>
                                        <select class="form-control" style="width: 350px;" name="sub_cat_id" id="sub_cat_id"
onChange="GoToPrintJSONAjaxData('photo_gallery/photos/ajax_list','SubTwoCat',this.value,'sub_two_cat_id','')" >
                                    <option value="">Select Sub Category</option>
                                </select>

                                    </div>
                                   
                                </div> 


                                    
                                    <div class="col-md-6" style="padding-bottom: 16px;">
                                    
                                    <div class="input-group input-large">
                                        <span class="input-group-addon">Sub level two Category : </span>
                                        <select class="form-control" style="width: 350px;" name="sub_two_cat_id" id="sub_two_cat_id" >
                                    <option value="">Select Sub level two Category</option>
                                </select>

                                    </div>
                                   
                                </div> 








<div class="col-md-6">
                                    
                                    <div class="input-group input-large" style="padding-bottom: 16px;">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                       

                                    </div>
                                   
                                </div> 




                                  
</form>



								<table
									class="display table table-bordered table-striped dataTable"
									id="dynamic-table" aria-describedby="dynamic-table_info">
									<thead>
										<tr role="row">
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Rendering engine: activate to sort column ascending"
												style="width: 60px;">S.NO</th>
											
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 125px;">Name</th>
                                                                                    <th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 125px;">Event</th>
                                                                                  <th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 225px;">Photo</th>
												
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 100px;">Post By</th>	
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 65px;">Status</th>

<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 150px;">Created</th>

   


											
												<th class="hidden-phone sorting_desc" role="columnheader"
												tabindex="0" aria-controls="dynamic-table" rowspan="1"
												colspan="1" aria-sort="descending"
												aria-label="CSS grade: activate to sort column ascending"
												style="width: 180px;">Action</th>
										</tr>
									</thead>


									<tbody role="alert" aria-live="polite" aria-relevant="all">
							
							  <?php
									
									$i = '0';
									foreach ( $photos_list as $details ) {
										$i += 1;
										?>
                                
                                <tr>
											<td class=""><?php echo $i; ?></td>
											 <td class=""><?php echo $details['name']; ?></td>
                                                                                         <td class=""><?php echo $details['event']; ?></td>

<td class="">
<a class="fancybox-button" rel="fancybox-button"  rel="gallery1" href="<?php echo base_url().PRODUCT_IMAGE_PATH.$details['file_name']; ?>" title="<?php echo $details['name']; ?>">
<?php if($details['file_name']){ ?><img alt="" height="70" width="150" src="<?php echo base_url().PRODUCT_THUMB_IMAGE_PATH.$details['file_name']; ?>" alt=""  /> <?php } ?> </a></td>
											<td class=""><?php echo $details['user_name']; ?></td>
											<td class=""><?php if($details['status']=="1"){ echo "Active"; } else { echo "Inactive"; } ?></td>
                                                                                 <td class=""><?php
                                                    echo date('d/m/Y H:i:A', strtotime($details['created_on']));
                                                    ?></td>
                                               

											<td class=""><a class="btn mini purple"
												href="<?php echo base_url(); ?>photo_gallery/photos/edit/<?php echo md5($details['id']); ?>/"><i
													class="fa fa-pencil" title="Edit"></i></a> 

<a class="btn mini purple" href="<?php echo base_url(); ?>photo_gallery/photos/view/<?php echo md5($details['id']); ?>/"><i
													class="fa fa-eye" title="View"></i></a>

<?php if($this->session->userdata('role_id')=="1"){ ?>

<a class="btn mini purple" href="<?php echo base_url(); ?>photo_gallery/photos/delete/<?php echo md5($details['id']); ?>/" 				onclick="javascript:return confirm('Are you sure you want to delete this data?')">
<i class="fa fa-trash-o" title="Delete"></i></a> <?php } ?></td>


										</tr>
								
								<?php } ?>
							</tbody>
								</table>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>




		<!--mini statistics end-->
	</section>
</section>
<!--main content end-->





 

