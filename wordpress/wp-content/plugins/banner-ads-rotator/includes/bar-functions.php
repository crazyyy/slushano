<?php






function bar_add_shortcode_column( $columns ) {
    return array_merge( $columns, 
        array( 
				'shortcode' => __( 'Shortcode', 'bar' ),
				'stats' => __( 'Stats', 'bar' )
		
		 		) );
}
add_filter( 'manage_ads_banner_posts_columns' , 'bar_add_shortcode_column' );


function bar_posts_shortcode_display( $column, $post_id ) {
    if ($column == 'shortcode'){
		?>
        <input style="background:#bfefff" type="text" onClick="this.select();" value="[bar <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" /><br />
      
        <?php		
		
    }
}
add_action( 'manage_ads_banner_posts_custom_column' , 'bar_posts_shortcode_display', 10, 2 );



function bar_posts_stats_display( $column, $post_id ) {
    if ($column == 'stats'){
		
		$postid = get_the_ID();
		global $wpdb;
		$result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}bar_info WHERE event='click' AND bannerid=$postid", ARRAY_A);
		$total_click = $wpdb->num_rows;

		echo 'Total click: '. $total_click.'<br />';	
		
		$result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}bar_info WHERE event='serve' AND bannerid=$postid", ARRAY_A);
		$total_serve = $wpdb->num_rows;
		echo 'Total serve: '.$total_serve;
		
		
    }
}
add_action( 'manage_ads_banner_posts_custom_column' , 'bar_posts_stats_display', 10, 2 );











function bar_display($atts,  $content = null ) {
		$atts = shortcode_atts(
			array(
				'group' => "",
				'id' => "",
				), $atts);
	
	
	if(!empty($atts['id']))
		{
			if( bar_geo_country_check($atts['id']) == 'no')
				{
					$postid = $atts['id'];
				}
			
			
		}
	else
		{
			$group = $atts['group'];
					
			$group = explode(',',$group);
			
			
			query_posts(array( 
					'post_type' => 'ads_banner',
					'tax_query' => array(
						array(
							   'taxonomy' => 'ads_banner_cat',
							   'field' => 'id',
							   'terms' => $group,
						)
					),

				) );  
			$ids_tax = array();
			$t=0;
			while (have_posts()) : the_post();
			
			if( bar_geo_country_check(get_the_id()) == 'no')
				{
					$ids_tax[$t]= get_the_id();
				}

			
			$t++;
			endwhile;
			wp_reset_query();
		
			if(empty($ids ))
				{
					$ids = $ids_tax;
				}
			else
				{
					$ids = $postid;
				}
		
		
		
			$total_banner = count($ids);
			$select_banner_id = rand(0,($total_banner-1));
			$postid = $ids_tax[$select_banner_id];
		}
	


	$ads_banner_type = get_post_meta( $postid, 'ads_banner_type', true );
	$ads_banner_source = get_post_meta( $postid, 'ads_banner_source', true );
	$ads_banner_source_html = get_post_meta( $postid, 'ads_banner_source_html', true );	
	$ads_banner_target = get_post_meta( $postid, 'ads_banner_target', true );
	$ads_banner_target_window = get_post_meta( $postid, 'ads_banner_target_window', true );	
	$ads_banner_size = get_post_meta( $postid, 'ads_banner_size', true );	
	$ads_banner_size_width = get_post_meta( $postid, 'ads_banner_size_width', true );	
	$ads_banner_size_height = get_post_meta( $postid, 'ads_banner_size_height', true );	



	$html= '';
	$html.= "<div class='bar-container' bannerid='".$postid."' target='".$ads_banner_source."' style='width:".$ads_banner_size_width."px; height:".$ads_banner_size_height."px;'   >";
	
	if($ads_banner_type=='img')
		{	
			$html.=  '<a target="'.$ads_banner_target_window.'" bannerid="'.$postid.'" href="'.$ads_banner_target.'" />';
			$html.=  "<img src='".$ads_banner_source."' />";
			$html.=  "</a>";
		}
	elseif($ads_banner_type=='swf' || $ads_banner_type=='video')
		{
			$html.= ' <object width="'.$ads_banner_size_width.'" height="'.$ads_banner_size_height.'" data="'.$ads_banner_source.'"></object> ';
		}
	elseif($ads_banner_type=='html')
		{
			$html.= $ads_banner_source_html;
		}		
		

	//$html.=  "<span class='bar-logo' style='background-image:url(".$bar_logo_img_link.");background-repeat: no-repeat;'></span>";


	
	$html.=  "</div>";
	
	bar_get_count($postid);
	
	
	
	return $html;



}

add_shortcode('bar', 'bar_display');






















function bar_get_count($bannerid)
	{
		

	
	// Get City And Country using get_city_country() Function
	$geo = explode(",",bar_get_city_country());
	$geo_country =$geo[0];
	$geo_city =$geo[1];	
	//----Get City And Country----- 
	
	// Get Browser name using Browser.php class
	$browser = new Browser_BAR();
	$platform = $browser->getPlatform();
	$browser = $browser->getBrowser();


	// ----Get Browser----- 



	$date = date('Y-m-d', strtotime('+'.get_option('gmt_offset').' hour'));
	$time = date('H:i', strtotime('+'.get_option('gmt_offset').' hour'));
	
	
	if(isset($_POST['bannerid']))
		{
		$bannerid = (int)$_POST['bannerid'];
		}
	else
		{
		$bannerid = $bannerid;
		}
		
	if(!empty($_POST['event'])){
		$event = $_POST['event'];
		}
	else{
		$event = '';
		
		}
	

		if($event=='click')
			{
				global $wpdb;
				$table = $wpdb->prefix . "bar_info";
				$wpdb->query( $wpdb->prepare("INSERT INTO $table 
										( id, bannerid, event, date, time, city, country, browser, platform )
								VALUES	( %d, %d, %s,%s, %s, %s, %s, %s, %s )",
								array	( '', $bannerid,'click', $date, $time, $geo_country, $geo_city, $browser, $platform)
										));
			}
		else
			{
				global $wpdb;
				$table = $wpdb->prefix . "bar_info";
				$wpdb->query( $wpdb->prepare("INSERT INTO $table 
										( id, bannerid, event, date, time, city, country, browser, platform )
								VALUES	( %d, %d, %s,%s, %s, %s, %s, %s, %s )",
								array	( '', $bannerid,'serve', $date, $time, $geo_country, $geo_city, $browser, $platform)
										));
			}




		
		return true;
		
		die();

	
	}

add_action('wp_ajax_bar_get_count', 'bar_get_count');
add_action('wp_ajax_nopriv_bar_get_count', 'bar_get_count');



function bar_get_city_country()
	{

	
	
		$geoplugin = new geoPlugin();
		$geoplugin->locate();
		
		
		$city = $geoplugin->city;
		$country = $geoplugin->countryName;
	
	if($city == "")
		{
		$city = "none";
		}
	else
		{
		$city = $city;
		}

	
	if($country == ""){
		$country = "none";}
	else {
		$country = $country;
		}
		
		return $city.",".$country;
	}






function bar_geo_country_check($bannerid)
	{
		$ads_banner_geo_country = get_post_meta( $bannerid, 'ads_banner_geo_country', true );
		
		$geoplugin = new geoPlugin();
		$geoplugin->locate();
		$country = $geoplugin->countryName;
			
		$country_match = array_search($country, $ads_banner_geo_country);
		
		if($country_match)
			{
				return 'yes';
			}	
		else
			{
				return 'no';
			}
		
			
	}



















function bar_dark_color($input_color)
	{
		if(empty($input_color))
			{
				return "";
			}
		else
			{
				$input = $input_color;
			  
				$col = Array(
					hexdec(substr($input,1,2)),
					hexdec(substr($input,3,2)),
					hexdec(substr($input,5,2))
				);
				$darker = Array(
					$col[0]/2,
					$col[1]/2,
					$col[2]/2
				);
		
				return "#".sprintf("%02X%02X%02X", $darker[0], $darker[1], $darker[2]);
			}

		
		
	}
	
	
	
	
	
	
	
	function bar_share_plugin()
		{
			
			?>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwordpress.org%2Fplugins%2Fbanner-ads-rotator%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=652982311485932" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
            
            <br />
            <!-- Place this tag in your head or just before your close body tag. -->
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo bar_share_url; ?>"></div>
            
            <br />
            <br />
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo bar_share_url; ?>" data-text="<?php echo bar_plugin_name; ?>" data-via="ParaTheme" data-hashtags="WordPress">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>



            <?php
			
			
			
		
		
		}
	
	
	
	
	
	