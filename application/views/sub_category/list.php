<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">
					
					<li><a class="current" href="<?php echo base_url();?>sub_category/"><?php echo SUBCAT_PAGE;?></a>
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
                        <?php echo SUBCAT_LIST;?>
                        <span class="tools pull-right">
							<button class="btn btn-primary"
								onclick="location.href ='<?php echo base_url(); ?>sub_category/add'">Add</button>

						</span>
					</header>
					<div class="panel-body">

						<div class="adv-table">
							<div id="dynamic-table_wrapper"
								class="dataTables_wrapper form-inline" role="grid">
								<table
									class="display table table-bordered table-striped dataTable"
									id="dynamic-table" aria-describedby="dynamic-table_info">
									<thead>
										<tr role="row">
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Rendering engine: activate to sort column ascending"
												style="width: 100px;">S.NO</th>
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Browser: activate to sort column ascending"
												style="width: 150px;">Category</th>	
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Browser: activate to sort column ascending"
												style="width: 150px;">Name</th>	
											<th class="sorting" role="columnheader" tabindex="0"
												aria-controls="dynamic-table" rowspan="1" colspan="1"
												aria-label="Platform(s): activate to sort column ascending"
												style="width: 200px;"> Status</th>
											
											
												<th class="hidden-phone sorting_desc" role="columnheader"
												tabindex="0" aria-controls="dynamic-table" rowspan="1"
												colspan="1" aria-sort="descending"
												aria-label="CSS grade: activate to sort column ascending"
												style="width: 125px;">Action</th>
										</tr>
									</thead>


									<tbody role="alert" aria-live="polite" aria-relevant="all">
							
							  <?php
									
									$i = '0';
									foreach ( $user_list as $details ) {
										$i += 1;
										?>
                                
                                <tr>
											<td class=""><?php echo $i; ?></td>
											<td class=""><?php echo $details['category']; ?></td>
											<td class=""><?php echo $details['name']; ?></td>
											<td class=""><?php if($details['status']=="1"){ echo "Active"; }
                                                                   else { echo "Inactive"; } ?></td>
											<td class=""><a class="btn mini purple"
												href="<?php echo base_url(); ?>sub_category/edit/<?php echo md5($details['id']); ?>/"><i
													class="fa fa-pencil" title="Edit"></i></a> <a class="btn mini purple"
												href="<?php echo base_url(); ?>sub_category/delete/<?php echo md5($details['id']); ?>/"
												onclick="javascript:return confirm('Are you sure you want to delete this data?')"><i
													class="fa fa-trash-o" title="Delete"></i></a></td>


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








