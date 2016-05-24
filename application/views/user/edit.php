
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">

					<li><a href="<?php echo base_url();?>user/"><?php echo STAFF_M_PAGE;?></a>
					</li>
					<li><a class="current" href="<?php echo base_url();?>user/edit/<?php echo $this->uri->segment(3); ?>/"><?php echo STAFF_M_EDIT;?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
                            <?php echo STAFF_M_EDIT;?>
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
							<form class="cmxform form-horizontal " id="user_add"
								method="post" action="<?php echo base_url();?>user/edit/<?php echo $this->uri->segment(3); ?>/" novalidate="novalidate">
								<div class="form-group ">
									<label for="firstname" class="control-label col-lg-3">Role *</label>
									<div class="col-lg-6">
										
										<select  class="form-control" style="width: 100%" id="role_id" name="role_id" >

											<option value="">Select Role</option>
										<?php if(sizeof($role_list)>0){	foreach ( $role_list as $detail ) {?>
											<option value="<?php echo $detail['id']; ?>"  <?php if($details['role_id']==$detail['id']){?> selected="selected" <?php }?>><?php echo $detail['name']; ?></option>
                                        <?php } }?>

										</select>
									</div>
								</div>
								
                               <div class="form-group ">
									<label for="lastname" class="control-label col-lg-3">User Name *</label>
									<div class="col-lg-6">
										<input class=" form-control" id="user_name" name="user_name"
											value="<?php echo $details['user_name'];?>" type="text">
									</div>
								</div>
                                <div class="form-group ">
									<label for="lastname" class="control-label col-lg-3">Password *</label>
									<div class="col-lg-6">
										<input class=" form-control" id="password" name="password"
											value="<?php echo AES_Decode($details['password']);?>" type="password">
									</div>
								</div>
								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-3">Email *</label>
									<div class="col-lg-6">
										<input class=" form-control" id="email" name="email"
											value="<?php echo $details['email'];?>" type="text">
									</div>
								</div>
								<div class="form-group ">
									<label for="Status" class="control-label col-lg-3">Status *</label>
									<div class="col-lg-8">
<input  id="status" name="status" value="1" checked="checked" type="radio"> Active &nbsp;&nbsp;
 <?php if ($this->session->userdata('uid')!=$details['id']) { ?> 
<input  id="status" name="status" value="0" <?php if($details['status']=="0"){ ?> checked="checked" <?php } ?> type="radio"> Inactive
 <?php } ?>
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

