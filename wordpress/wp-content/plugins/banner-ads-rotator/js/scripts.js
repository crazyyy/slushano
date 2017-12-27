
jQuery(document).ready(function($)
	{
		
		$(document).on('click', '.ads_banner_type', function()
			{
 				var val = jQuery(this).val();
				if(val == 'html')
					{
					jQuery('.ads_banner_source_html').fadeIn();
					jQuery('.ads_banner_source').fadeOut();
					}
				else
					{
					jQuery('.ads_banner_source_html').fadeOut();
					jQuery('.ads_banner_source').fadeIn();
					}
			})
			
			

	jQuery(".bar-container object").mousedown(function()
		{
			//alert("Hello");	
		})


	jQuery(".bar-container a").mousedown(function()
		{	
		var bannerid = jQuery(this).attr("bannerid");
	

					
		jQuery.ajax(
			{
		type: 'POST',
		url:bar_ajax.bar_ajaxurl,
		data: {"action": "bar_get_count", "bannerid":bannerid,"event":"click", },
		success: function(data)
				{	
					
				}
			});


		});
					
				






		

		$(document).on('change', '#ads_banner_size', function()
			{	
				
				var size = $(this).val();
				var size = size.split(",");			
				
				var width = size[0];
				var height = size[1];
				
				$("#ads_banner_size_width").val(width);
				$("#ads_banner_size_height").val(height);
				
				
			})	
		

 		

	});	







