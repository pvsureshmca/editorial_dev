
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">

					<li><a href="<?php echo base_url();?>user/"><?php echo STAFF_M_PAGE;?></a>
					</li>
					<li><a class="current" href="<?php echo base_url();?>user/add"><?php echo STAFF_M_ADD;?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
                            <?php echo STAFF_M_ADD;?>
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
								method="post" action="<?php echo base_url();?>user/add" novalidate="novalidate">
								<div class="form-group ">
									<label for="firstname" class="control-label col-lg-3">Role *</label>
									<div class="col-lg-6">
										<select  class="form-control" style="width: 100%" id="role_id" name="role_id" >

											<option value="">Select Role</option>
										<?php if(sizeof($role_list)>0){	foreach ( $role_list as $details ) {?>
											<option value="<?php echo $details['id']; ?>"  <?php if(set_value('role_id')==$details['id']){?> selected="selected" <?php }?>><?php echo $details['name']; ?></option>
                                        <?php } }?>

										</select>
									</div>
								</div>
								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-3">User Name *</label>
									<div class="col-lg-6">
										<input class=" form-control" id="user_name" name="user_name"
											value="<?php echo set_value('user_name');?>" type="text">
									</div>
								</div>
                                <div class="form-group ">
									<label for="lastname" class="control-label col-lg-3">Password *</label>
									<div class="col-lg-6">
										<input class=" form-control" id="password" name="password"
											value="" type="password">
									</div>
								</div>
								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-3">Email *</label>
									<div class="col-lg-6">
										<input class=" form-control" id="email" name="email"
											value="<?php echo set_value('email');?>" type="text">
									</div>
								</div>
								<div class="form-group ">
									<label for="Status" class="control-label col-lg-3">Status *</label>
									<div class="col-lg-8">
<input  id="status" name="status" value="1" checked="checked" type="radio"> Active &nbsp;&nbsp;
<input  id="status" name="status" value="0" <?php if(set_value('status')=="0"){ ?> checked="checked" <?php } ?> type="radio"> Inactive
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

