<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">
					
					<li><a class="current" href="<?php echo base_url();?>article/"><?php echo ARTICLE_PAGE;?></a>
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
                        <?php echo ARTICLE_LIST;?>
                        <span class="tools pull-right">
							<button class="btn btn-primary"
								onclick="location.href ='<?php echo base_url(); ?>article/add'">Add</button>

						</span>
					</header>
					<div class="panel-body">

						<div class="adv-table">
							<div id="dynamic-table_wrapper"
								class="dataTables_wrapper form-inline" role="grid">
<form class="cmxform form-horizontal " method="post" action="<?php echo base_url();?>article/index/" novalidate="novalidate" enctype="multipart/form-data">
                                  <div class="col-md-6" style="padding-bottom: 16px;">
                                    
                                    <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                                        <span class="input-group-addon">Created : </span>
                                        <input type="text" class="form-control dpd1" 
value="<?php if ($post_data!=""){ if($post_data['from']) { echo $post_data['from']; }}?>"  id="dateStart" name="from">

                                        <span class="input-group-addon">To</span>
                                        <input type="text" class="form-control dpd2" value="<?php if ($post_data!=""){ if($post_data['to']) { echo $post_data['to']; }}?>"  id="dateEnd"  name="to">
                                    </div>
                                   
                                </div>

                                 <div class="col-md-6">
                                    
                                    <div class="input-group input-large" style="padding-bottom: 16px;">
                                        <span class="input-group-addon">Post By : </span>
                                        <select class="form-control" style="width: 410px;" name="user_id" id="user_id">
                                    <option value="">Select User</option>
                                    <?php foreach ($user_list as $user) { ?>
                                        <option value="<?php echo $user['id']; ?>"
                                                <?php if ($post_data!=""){ if($user['id'] == $post_data['user_id']) { ?> selected = "selected" <?php } } ?>
                                                > <?php echo $user['user_name']; ?></option>
                                            <?php } ?>
                                </select>

                                    </div>
                                   
                                </div>   
          


                                <div class="col-md-6" style="padding-bottom: 16px;">
                                    
                                    <div class="input-group input-large">
                                        <span class="input-group-addon">Category : </span>
                                        <select class="form-control" style="width: 380px;" name="cat_id" id="cat_id" onChange="GoToPrintJSONAjaxDetails('SubCat',this.value,'sub_cat_id','')" >
                                    <option value="">Select Category</option>
                                    <?php foreach ($category_list as $cat) { ?>
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
                                        <select class="form-control" style="width: 350px;" name="sub_cat_id" id="sub_cat_id">
                                    <option value="">Select Sub Category</option>
                                </select>

                                    </div>
                                   
                                </div> 

 <div class="col-md-6">
                                    
                                    <div class="input-group input-large" style="padding-bottom: 16px;">
                                        <span class="input-group-addon">Newspaper : </span>
                                        <select class="form-control" style="width: 365px;" name="newspaper_id" id="newspaper_id">
                                    <option value="">Select Newspaper</option>
                                    <?php foreach ($newspaper_list as $news) { ?>
                                        <option value="<?php echo $news['id']; ?>"
                                                <?php if ($post_data!=""){ if($news['id'] == $post_data['newspaper_id']) { ?> selected = "selected" <?php } } ?>
                                                > <?php echo $news['name']; ?></option>
                                            <?php } ?>
                                </select>

                                    </div>
                                   
                                </div> 





<div class="col-md-6">
                                    
                                    <div class="input-group input-large" style="padding-bottom: 16px;">
                                        <span class="input-group-addon">Status : </span>
                                        <select class="form-control" style="width: 410px;" name="status" id="status">
                                    <option value="">Select status</option>
                                     <option value="1" <?php if ($post_data!=""){ if($post_data['status']=="1") { ?> selected = "selected" <?php } } ?> >Unfiled</option>
                                       <option value="2" <?php if ($post_data!=""){ if($post_data['status']=="2") { ?> selected = "selected" <?php } } ?> >filed</option>
                                       <option value="3" <?php if ($post_data!=""){ if($post_data['status']=="3") { ?> selected = "selected" <?php } } ?> >Paged</option>
       
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
												aria-label="Browser: activate to sort column ascending"
												style="width: 125px;">Category</th>	
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Browser: activate to sort column ascending"
												style="width: 125px;">Sub Category</th>	
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 125px;">Title</th>
												
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

    <th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 150px;">Modified</th>


											
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
									foreach ( $article_list as $details ) {
										$i += 1;
										?>
                                
                                <tr>
											<td class=""><?php echo $i; ?></td>
											<td class=""><?php echo $details['category']; ?></td>
											<td class=""><?php echo $details['sub_category']; ?></td>
											<td class=""><?php echo $details['title']; ?></td>
											<td class=""><?php echo $details['user_name']; ?></td>
											<td class=""><?php if($details['status']=="1"){ echo "Unfiled"; } else if($details['status']=="2"){ echo "filed"; }
                                                                   else if($details['status']=="3") { echo "Paged"; } ?></td>
                                                                                 <td class=""><?php
                                                    echo date('d/m/Y H:i:A', strtotime($details['created_on']));
                                                    ?></td>
                                                <td class=""><?php
                                                    echo date('d/m/Y H:i:A', strtotime($details['updated_on']));
                                                    ?></td>

											<td class=""><a class="btn mini purple"
												href="<?php echo base_url(); ?>article/edit/<?php echo md5($details['id']); ?>/"><i
													class="fa fa-pencil" title="Edit"></i></a> 

<a class="btn mini purple" href="<?php echo base_url(); ?>article/view/<?php echo md5($details['id']); ?>/"><i
													class="fa fa-eye" title="View"></i></a>

<?php if($this->session->userdata('role_id')=="1"){ ?>

<a class="btn mini purple" href="<?php echo base_url(); ?>article/delete/<?php echo md5($details['id']); ?>/" 				onclick="javascript:return confirm('Are you sure you want to delete this data?')">
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





 

