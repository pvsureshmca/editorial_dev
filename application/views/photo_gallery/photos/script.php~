





<script type="text/javascript">






var sampleTags = <?php if (sizeof($tag_list)>0){ echo json_encode($tag_list); } else{ echo "[]"; } ?>;

            $('#allowSpacesTags').tagit({
                availableTags: sampleTags, allowSpaces: true,
                itemName: 'item',
                fieldName: 'tag_id[]'
            });

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

