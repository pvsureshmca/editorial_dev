<!--right sidebar start-->
<div class="right-sidebar"></div>
<!--right sidebar end-->
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script
	src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bs3/js/bootstrap.min.js"></script>
<script
	src="<?php echo base_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
<script
	src="<?php echo base_url(); ?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo base_url(); ?>assets/js/skycons/skycons.js"></script>
<script
	src="<?php echo base_url(); ?>assets/js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script
	src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/calendar/clndr.js"></script>
<script
	src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script
	src="<?php echo base_url(); ?>assets/js/calendar/moment-2.2.1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/evnt.calendar.init.js"></script>
<script
	src="<?php echo base_url(); ?>assets/js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script
	src="<?php echo base_url(); ?>assets/js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<script src="<?php echo base_url(); ?>assets/js/gauge/gauge.js"></script>
<!--clock init-->
<script
	src="<?php echo base_url(); ?>assets/js/css3clock/js/css3clock.js"></script>




<!--dynamic table-->
<script type="text/javascript" language="javascript"
	src="<?php echo base_url(); ?>assets/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/js/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-multi-select/js/jquery.quicksearch.js"></script>	
	

<!-- date picker -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>


<script src="<?php echo base_url(); ?>assets/js/select2/select2.js"></script>


<script src="<?php echo base_url(); ?>assets/js/tag_it/tag_it.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>

<script src="<?php echo base_url(); ?>assets/js/tree/jquery.easing.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/tree/jqueryFileTree.js" type="text/javascript"></script>
		<link href="<?php echo base_url(); ?>assets/js/tree/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />

<!--common script init for all pages-->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<!--script for this page-->




<!--dynamic table initialization -->
<script src="<?php echo base_url(); ?>assets/js/dynamic_table_init.js"></script>

<script src="<?php echo base_url(); ?>assets/js/advanced-form.js"></script>


<!--this page script-->
<script src="<?php echo base_url(); ?>assets/js/validation-init.js"></script>



<script>
   
        var base_url="<?php echo base_url(); ?>";
        var assets_url="<?php echo base_url().'assets/'; ?>";
        var text_file_path= "<?php echo PROJECT_PATH.FILE_PATH; ?>"; 

function get_path(id, replace_id){

$('#'+id).fileTree({ root: text_file_path, script: base_url+'article/get_files/' }, function(file) { 

var res = file.replace("<?php echo PROJECT_PATH; ?>", base_url);


$.get(res, function(data) {

CKEDITOR.instances[replace_id].setData(data)

    
});



					
				});
}




     
</script>

<?php if($this->uri->segment(1)=="article" && ($this->uri->segment(2)=="add" or $this->uri->segment(2)=="edit")){ 

$cat_id="";$sub_cat_id="";
if(set_value('cat_id')!=""){
	
	$cat_id=set_value('cat_id');
	$sub_cat_id=set_value('sub_cat_id');
}
else if(isset($details['cat_id']) && !empty($details['cat_id']) ) {
		$cat_id=$details['cat_id'];
		$sub_cat_id=$details['sub_cat_id'];
}

//echo "sss".$sub_cat_id; exit;
}
?>

<?php if($this->uri->segment(1)=="article"){ ?>

<script type="text/javascript">



 <?php if(isset($post_data) && $post_data !=""){ if($post_data['cat_id'] !="") { ?>

GoToPrintJSONAjaxDetails('State','<?php echo $post_data["cat_id"];?>','sub_cat_id','<?php echo $post_data["sub_cat_id"];?>');

 <?php }} ?>





<?php if($this->uri->segment(2)=="add" or $this->uri->segment(2)=="edit"){ ?>



         $(document).ready(function() {
    
          // $("#cat_id").select2();
         // $("#sub_cat_id").select2();
         //  $("#layout_id").select2();
     //      $("#page_id").select2();




                 

                 CKEDITOR.replace( 'paper_summary',{
				extraPlugins : 'wordcount',
				wordcount : {
					showCharCount : true,
					showWordCount : true,
    
					// Maximum allowed Word Count
					//maxWordCount: 300,

					// Maximum allowed Char Count
					//maxCharCount: 1000 description
				}
				} );

                CKEDITOR.replace( 'web_summary',{
				extraPlugins : 'wordcount',
				wordcount : {
					showCharCount : true,
					showWordCount : true,
    
					// Maximum allowed Word Count
					//maxWordCount: 300,

					// Maximum allowed Char Count
					//maxCharCount: 1000 description
				}
				} );

                CKEDITOR.replace( 'mobile_summary',{
				extraPlugins : 'wordcount',
				wordcount : {
					showCharCount : true,
					showWordCount : true,
    
					// Maximum allowed Word Count
					//maxWordCount: 300,

					// Maximum allowed Char Count
					//maxCharCount: 1000 description
				}
				} );


 CKEDITOR.replace( 'paper_description',{
				extraPlugins : 'wordcount',
				wordcount : {
					showCharCount : true,
					showWordCount : true,
    
					// Maximum allowed Word Count
					//maxWordCount: 300,

					// Maximum allowed Char Count
					//maxCharCount: 1000 description
				}
				} );
 CKEDITOR.replace( 'web_description',{
				extraPlugins : 'wordcount',
				wordcount : {
					showCharCount : true,
					showWordCount : true,
    
					// Maximum allowed Word Count
					//maxWordCount: 300,

					// Maximum allowed Char Count
					//maxCharCount: 1000 description
				}
				} );
 CKEDITOR.replace( 'mobile_description',{
				extraPlugins : 'wordcount',
				wordcount : {
					showCharCount : true,
					showWordCount : true,
    
					// Maximum allowed Word Count
					//maxWordCount: 300,

					// Maximum allowed Char Count
					//maxCharCount: 1000 description
				}
				} );






             

            var sampleTags = <?php if (sizeof($tag_list)>0){ echo json_encode($tag_list); } else{ echo "[]"; } ?>;

            $('#allowSpacesTags').tagit({
                availableTags: sampleTags, allowSpaces: true,
                itemName: 'item',
                fieldName: 'tag_id[]'
            });

             $('#newspaper_id').multiSelect({
    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
    afterInit: function (ms) {
        var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
            .on('keydown', function (e) {
                if (e.which === 40) {
                    that.$selectableUl.focus();
                    return false;
                }
            });

        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
            .on('keydown', function (e) {
                if (e.which == 40) {
                    that.$selectionUl.focus();
                    return false;
                }
            });
    },
    afterSelect: function () {
        this.qs1.cache();
        this.qs2.cache();
    },
    afterDeselect: function () {
        this.qs1.cache();
        this.qs2.cache();
    }
});

         });



 <?php } ?>


<?php if($this->uri->segment(1)=="article" && ($this->uri->segment(2)=="add" or $this->uri->segment(2)=="edit") && $cat_id !=""){   ?> 

GoToPrintJSONAjaxDetails('State','<?php echo $cat_id;?>','sub_cat_id','<?php echo $sub_cat_id;?>');

 <?php }?>



function GoToSetValues(replace_id, id){

 if(id){
   

  var AjaxRes=$.ajax({ 
		url: base_url+'article/ajax_get_article_version/',
		type: "POST",
		dataType:'html',
		data: {SelId:id,type:replace_id},
		error:function (xhr){
			alert('Server Error');
		},
		success: function(JSonRes){
			if(JSonRes !='false'){
				CKEDITOR.instances[replace_id].setData(JSonRes);		
			}
			
		}
	});

  

} 
}
</script>

<?php } ?>

<?php if($this->uri->segment(1)=="news_paper" && ($this->uri->segment(2)=="add" or $this->uri->segment(2)=="edit") ){   ?> 
<script type="text/javascript">
 $(document).ready(function() {
$('#article_id').multiSelect({
    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
    afterInit: function (ms) {
        var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
            .on('keydown', function (e) {
                if (e.which === 40) {
                    that.$selectableUl.focus();
                    return false;
                }
            });

        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
            .on('keydown', function (e) {
                if (e.which == 40) {
                    that.$selectionUl.focus();
                    return false;
                }
            });
    },
    afterSelect: function () {
        this.qs1.cache();
        this.qs2.cache();
    },
    afterDeselect: function () {
        this.qs1.cache();
        this.qs2.cache();
    }
});


  });

</script>
<?php } ?>


</body>
</html>
