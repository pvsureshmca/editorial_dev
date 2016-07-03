


<?php 

$cat_id="";$sub_cat_id="";
if(isset($post_data['cat_id']) && !empty($post_data['cat_id']) ) {
		$cat_id=$post_data['cat_id'];
		$sub_cat_id=$post_data['sub_cat_id'];
               $sub_two_cat_id=$post_data['sub_two_cat_id'];
}



?>



<script type="text/javascript">



 <?php if(isset($cat_id) && $cat_id !=""){  ?>

GoToPrintJSONAjaxData('photo_gallery/photos/ajax_list','SubCat','<?php echo $cat_id;?>','sub_cat_id','<?php echo $sub_cat_id; ?>');

GoToPrintJSONAjaxData('photo_gallery/photos/ajax_list','SubTwoCat','<?php echo $sub_cat_id;?>','sub_two_cat_id','<?php echo $sub_two_cat_id; ?>');

 <?php } ?>

$(document).ready(function() {
	$(".fancybox-button").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		closeBtn		: false,
		helpers		: {
			title	: { type : 'inside' },
			buttons	: {}
		}
	});
});




</script>

