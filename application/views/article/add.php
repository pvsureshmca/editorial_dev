
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">

					<li><a href="<?php echo base_url();?>article/"><?php echo ARTICLE_PAGE;?></a>
					</li>
					<li><a class="current" href="<?php echo base_url();?>article/add"><?php echo ARTICLE_ADD;?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
                            <?php echo ARTICLE_ADD;?>
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
							<form class="cmxform form-horizontal " id="article_add"
								method="post" action="<?php echo base_url();?>article/add" novalidate="novalidate" enctype="multipart/form-data">
								



<div class="form-group ">
									<label for="firstname" class="control-label col-lg-2">Title *</label>
									<div class="col-lg-8">
										<input class=" form-control" id="title" name="title"
										 value="<?php echo set_value('title');?>" type="text">
									</div>
								</div>

								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Category *</label>
									
									<div class="col-lg-8">
										
										<select  class="form-control" style="width: 100%;height:100%;" id="cat_id" name="cat_id"
										 onChange="GoToPrintJSONAjaxDetails('SubCat',this.value,'sub_cat_id','')" >

											<option value="">Select Category</option>
										<?php if(sizeof($category_list)>0){	foreach ( $category_list as $details ) {?>
											<option value="<?php echo $details['id']; ?>"  <?php if(set_value('cat_id')==$details['id']){?> selected="selected" <?php }?>><?php echo $details['name']; ?></option>
                                        <?php } }?>

										</select>
									</div>
								</div>
								<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Sub Category *</label>
									
									<div class="col-lg-8">
										
										<select  class="form-control" style="width: 100%;height:100%;" id="sub_cat_id" name="sub_cat_id" >

											<option value="">Select sub Category</option>
										

										</select>
									</div>
								</div>
								
								


								<div class="form-group ">
									<label for="firstname" class="control-label col-lg-2">Newspaper *</label>
									<div class="col-lg-8">

                                                                                 <select   class="multi-select" style="width: 100%;height:100%;" multiple="" name="newspaper_id[]" id="newspaper_id">
                                   
                                    <?php foreach ($newspaper_list as $news) { ?>
                                        <option value="<?php echo $news['id']; ?>"
                                                <?php  if(in_array($news['id'], $news_set)) { ?> selected = "selected" <?php } ?>
                                                > <?php echo $news['name']; ?></option>
                                            <?php } ?>
                                </select>


										
									</div>
								</div>

                                                            <div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Layout *</label>
									
									<div class="col-lg-8">
										
										<select  class="form-control" style="width: 100%;height:100%;" id="layout_id" name="layout_id"  >

											<option value="">Select Layout</option>
										<?php if(sizeof($layout_list)>0){	foreach ( $layout_list as $layout ) {?>
											<option value="<?php echo $layout['id']; ?>"  <?php if(set_value('layout_id')==$layout['id']){?> selected="selected" <?php }?>><?php echo $layout['name']; ?></option>
                                        <?php } }?>

										</select>
									</div>
								</div>

                                                        <div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Page *</label>
									
									<div class="col-lg-8">
										
										<select  class="form-control" style="width: 100%;height:100%;" id="page_id" name="page_id"  >

											<option value="">Select page</option>
										<?php if(sizeof($page_list)>0){	foreach ( $page_list as $page ) {?>
											<option value="<?php echo $page['id']; ?>" 
 <?php if(set_value('page_id')==$page['id']){?> selected="selected" <?php }?>><?php echo $page['name']; ?></option>
                                        <?php } }?>

										</select>
									</div>
								</div>

 
<!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#paper"><b>Paper</b></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#web"><b>Web</b></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#mobile"><b>Mobile</b></a>
                        </li>
                        
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">


                        <div id="paper" class="tab-pane active">

<div class="col-lg-3">
                            <h5><b>Paper Summary</b> 

</h5> 

</div>
 <div class="col-lg-1" style="padding-bottom: 10Px;">  <button class="btn btn-primary"  onclick="get_path('paper_sum','paper_summary')" type="button">PTI</button> </div> 
 <div class="col-lg-8" style="padding-bottom: 10Px;" > 

<div id="paper_sum" class="demo"></div>

</div>

<div class="col-lg-12">

<textarea class="form-control" id="paper_summary" name="paper_summary" rows="15">
									<?php echo trim($paper_summary);?></textarea>

</div>
                        </div>


<div id="web" class="tab-pane">

<div class="col-lg-3">
                            <h5><b>Web Summary</b> 

</h5> 

</div>
 <div class="col-lg-1" style="padding-bottom: 10Px;">  <button class="btn btn-primary"  onclick="get_path('web_sum','web_summary')" type="button">PTI</button> </div> 
 <div class="col-lg-8" style="padding-bottom: 10Px;" > 

<div id="web_sum" class="demo"></div>

</div>

<div class="col-lg-12">

<textarea class="form-control" id="web_summary" name="web_summary" rows="15">
									<?php echo trim($web_summary);?></textarea>

</div>
                        </div>





<div id="mobile" class="tab-pane">

<div class="col-lg-3">
                            <h5><b>Mobile Summary</b> 

</h5> 

</div>
 <div class="col-lg-1" style="padding-bottom: 10Px;">  <button class="btn btn-primary"  onclick="get_path('mobile_sum','mobile_summary')" type="button">PTI</button> </div> 
 <div class="col-lg-8" style="padding-bottom: 10Px;" > 

<div id="mobile_sum" class="demo"></div>

</div>

<div class="col-lg-12">

<textarea class="form-control" id="mobile_summary" name="mobile_summary" rows="15">
									<?php echo trim($mobile_summary);?></textarea>

</div>
                        </div>

                        


                        
                    </div>
                </div>
            </section>
            <!--tab nav end-->

<div class="form-group ">
<div class="control-label col-lg-2" > <button class="btn btn-primary"  onclick="get_image('art_image')" type="button">Photos</button> </div> 
 <div class="col-lg-8" style="padding-bottom: 10Px;" > 

<div id="art_image" class="demo"></div>

</div>

</div>
<!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#paper1"><b>Paper</b></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#web1"><b>Web</b></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#mobile1"><b>Mobile</b></a>
                        </li>
                        
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">


                        <div id="paper1" class="tab-pane active">

<div class="col-lg-3">
                            <h5><b>Paper Description</b> 

</h5> 

</div>
 <div class="col-lg-1" style="padding-bottom: 10Px;">  <button class="btn btn-primary"  onclick="get_path('paper_desc','paper_description')" type="button">PTI</button> </div> 
 <div class="col-lg-8" style="padding-bottom: 10Px;" > 

<div id="paper_desc" class="demo"></div>

</div>

<div class="col-lg-12">

<textarea class="form-control" id="paper_description" name="paper_description" rows="15">
									<?php echo trim($paper_description);?></textarea>

</div>
                        </div>


<div id="web1" class="tab-pane">

<div class="col-lg-3">
                            <h5><b>Web Description</b> 

</h5> 

</div>
 <div class="col-lg-1" style="padding-bottom: 10Px;">  <button class="btn btn-primary"  onclick="get_path('web_desc','web_description')" type="button">PTI</button> </div> 
 <div class="col-lg-8" style="padding-bottom: 10Px;" > 

<div id="web_desc" class="demo"></div>

</div>

<div class="col-lg-12">

<textarea class="form-control" id="web_description" name="web_description" rows="15">
									<?php echo trim($web_description);?></textarea>

</div>
                        </div>





<div id="mobile1" class="tab-pane">

<div class="col-lg-3">
                            <h5><b>Mobile Description</b> 

</h5> 

</div>
 <div class="col-lg-1" style="padding-bottom: 10Px;">  <button class="btn btn-primary"  onclick="get_path('mobile_desc','mobile_description')" type="button">PTI</button> </div> 
 <div class="col-lg-8" style="padding-bottom: 10Px;" > 

<div id="mobile_desc" class="demo"></div>

</div>

<div class="col-lg-12">

<textarea class="form-control" id="mobile_description" name="mobile_description" rows="15">
									<?php echo trim($mobile_description);?></textarea>

</div>
                        </div>

                        


                        
                    </div>
                </div>
            </section>
            <!--tab nav end-->


<div class="form-group ">
									<label for="lastname" class="control-label col-lg-2">Tags</label>
									
									<div class="col-lg-8">

                                                                       <ul id="allowSpacesTags">
                                                        <?php if(sizeof($tags_set)>0){	foreach ( $tags_set as $tags_val ) {?>
											<li> <?php echo $tags_val; ?></li>
                                                         <?php } }?>
                                                                            </ul>
										
										
									</div>
								</div>



								<div class="form-group ">
									<label for="Status" class="control-label col-lg-3">Status *</label>
									<div class="col-lg-8">
<input  id="status" name="status" value="1" checked="checked" type="radio"> Unfiled &nbsp;&nbsp;
<input  id="status" name="status" value="2" <?php if(set_value('status')=="2"){ ?> checked="checked" <?php } ?> type="radio"> Filed &nbsp;&nbsp;
<input  id="status" name="status" value="3" <?php if(set_value('status')=="3"){ ?> checked="checked" <?php } ?> type="radio"> Paged
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

 
 
