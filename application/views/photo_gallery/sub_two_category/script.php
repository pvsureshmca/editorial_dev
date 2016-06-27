


<?php 

$cat_id="";$sub_cat_id="";
if(set_value('cat_id')!=""){
	
	$cat_id=set_value('cat_id');
	$sub_cat_id=set_value('sub_cat_id');
}
else if(isset($details['cat_id']) && !empty($details['cat_id']) ) {
		$cat_id=$details['cat_id'];
		$sub_cat_id=$details['sub_cat_id'];
}



?>



<script type="text/javascript">



 <?php if(isset($cat_id) && $cat_id !=""){ if($cat_id !="") { ?>

GoToPrintJSONAjaxData('photo_gallery/sub_two_category/ajax_list','SubCat','<?php echo $cat_id;?>','sub_cat_id','<?php echo $sub_cat_id; ?>');

 <?php }} ?>






</script>

