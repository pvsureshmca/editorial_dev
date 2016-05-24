var Script = function () {

    $.validator.setDefaults({
        submitHandler: function(form) {
        	 
            // do other things for a valid form
            form.submit(); }
    });

    $().ready(function() {
       

     // validate signup form on keyup and submit
        $("#user_add").validate({
            rules: {
            	role_id: {
                    required: function () {
                        return ($("#role_id option:selected").val() == "");
                    }
                },
            	user_name: "required",
            	password: "required",
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
            	role_id: "Please select role",
            	user_name: "Please enter user name",
            	password: "Please enter password",
            	email: "Please enter a valid email"
            }

        
      });
       
        
        // validate signup form on keyup and submit
        $("#category_add").validate({
            rules: {
            	name: "required"
            },
            messages: {
            	name: "Please enter name"
            }
        });

       // validate signup form on keyup and submit
        $("#news_paper_add").validate({
            rules: {
            	name: "required"
            },
            messages: {
            	name: "Please enter name"
            }
        });

       // validate signup form on keyup and submit
        $("#tags_add").validate({
            rules: {
            	name: "required"
            },
            messages: {
            	name: "Please enter name"
            }
        });
        
     // validate signup form on keyup and submit
        $("#news_paper_page_add").validate({
            rules: {
            	
            	cat_id: {
                    required: function () {
                        return ($("#news_paper_id option:selected").val() == "");
                    }
                },
               name: "required"
            },
            messages: {
            	
            	news_paper_id: "Please select newspaper",
                name: "Please enter name"
            }
        });
        
 // validate signup form on keyup and submit
        $("#sub_category_add").validate({
            rules: {
            	
            	cat_id: {
                    required: function () {
                        return ($("#cat_id option:selected").val() == "");
                    }
                },
               name: "required"
            },
            messages: {
            	
            	cat_id: "Please select category",
                name: "Please enter name"
            }
        });
        
     // validate signup form on keyup and submit
        $("#article_add").validate({
            rules: { 
            	title: "required",
            	cat_id: {
                    required: function () {
                        return ($("#cat_id option:selected").val() == "");
                    }
                },
                sub_cat_id: {
                    required: function () {
                        return ($("#sub_cat_id option:selected").val() == "");
                    }
                },
                layout_id: {
                    required: function () {
                        return ($("#layout_id option:selected").val() == "");
                    }
                },
                page_id: {
                    required: function () {
                        return ($("#layout_id option:selected").val() == "");
                    }
                },
                
            },
            messages: {
            	title: "Please enter title",
            	layout_id: "Please select layout",
            	page_id: "Please select page",
            	cat_id: "Please select category",
            	sub_cat_id: "Please select sub category",
            }
            
           
        });
         
        // validate signup form on keyup and submit
        $("#bookmark_add").validate({
            rules: { 
            	title: "required",
                url: "required",
                description: "required"
                
            },
            messages: {
            	title: "Please enter title",
                URL: "Please enter url",
                description: "Please enter description"
            	
            }
            
           
        });

           // validate signup form on keyup and submit
        $("#article_comment_add").validate({
            rules: { 
            	
            	article_id: {
                    required: function () {
                        return ($("#article_id option:selected").val() == "");
                    }
                },
                description: "required"
                
            },
            messages: {
            	article_id: "Please select article",
                description: "Please enter description"
            	
            }
            
           
        });
        

    });
}();

//JavaScript Document
function GoToPrintJSONAjaxDetails(SelType,SelId,ResDiv,Default){
	//alert(SelId+'------'+Default);
	var AjacRes=jQuery.ajax({ 
		url: base_url+'article/ajax_sub_category_list/',
		type: "POST",
		dataType:'json',
		data: {SelType:SelType,SelId:SelId},
		error:function (xhr){
			alert('Server Error');
		},
		success: function(JSonRes){
			if(JSonRes.ajax_res=='true'){
				jQuery('#'+ResDiv+' >option').remove();
				var DataList=JSonRes.sel_list;
				jQuery.each(DataList, function(i, DataDet){
					jQuery.each(DataDet, function(key, val){						
						var myCombo= jQuery('#'+ResDiv);
						if(Default==key){				
							myCombo.append(jQuery('<option value="'+key+'" selected="selected">'+val+'</option>'));
						}
						else{
							myCombo.append(jQuery('<option value="'+key+'">'+val+'</option>'));
						}
					});
				}); 		
			}
                   
		}
	});
}


function GoToAddSalesperson(SelType,SelId,order_id){
	
	//alert(SelId+'------'+order_id+'......'+SelType);
	
	var AjacRes=jQuery.ajax({ 
		url: base_url+'orders/ajax_add_salesperson/',
		type: "POST",
		dataType:'json',
		data: {SelType:SelType,SelId:SelId,order_id:order_id},
		error:function (xhr){
			alert('Server Error');
		},
		success: function(JSonRes){
			if(JSonRes.ajax_res=='true'){
				GoBackRedirct(base_url+'orders/view/'+order_id+'/');		
			}
			else{
				alert(JSonRes.ajax_msg);
			}
		}
	});
	
}
function GoBackRedirct(RedirURL)
{
	window.location.href= RedirURL;return false;
}
function GoToShowHide(show,hide){
	jQuery('#'+show).show();
	jQuery('#'+hide).hide();
}

function addFormField() {
	if(document.getElementById("add_id").value < 5){
	var id = document.getElementById("add_id").value;
	
	
	jQuery("#add_more").append('<div class="form-group" id="add_field_'+id+'" ><label for="" class="control-label col-lg-3"></label><div class="col-lg-6"><div><div style="width:30%;float:left;margin-right:10PX;"><input class="form-control"  id="packag" name="packag[]" value="" type="number"></div><div style="width:30%;float:left;margin-left:10PX;"><select  class="form-control"  id="packag_type" name="packag_type[]" ><option value="1">Kg</option><option value="2">Bag</option></select></div><div style="width:20%;float:left;margin-left:10PX;"><button class="btn btn-primary" type="button" onclick="removeFormField(\'#add_field_'+id+'\'); return false;">remove</button></div></div></div></div>');
	id = (id-1) + 2;
	document.getElementById('add_id').value = id;
	}
	else
		alert('Limit Reached');
	
}
function removeFormField(id) {
	if(document.getElementById("add_id").value >1)
	document.getElementById("add_id").value = document.getElementById("add_id").value-1;
	jQuery(id).remove();
}

/*if($('input[name=type]:checked').val()=="2"){
	$('label[for="price"]').hide();  
} */
