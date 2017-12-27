<?php


function ads_banner_posttype_register() {
 
        $labels = array(
                'name' => _x('Ads Banner', 'ads_banner'),
                'singular_name' => _x('Ads Banner', 'ads_banner'),
                'add_new' => _x('New Ads Banner', 'ads_banner'),
                'add_new_item' => __('New Ads Banner'),
                'edit_item' => __('Edit Ads Banner'),
                'new_item' => __('New Ads Banner'),
                'view_item' => __('View Ads Banner'),
                'search_items' => __('Search Ads Banner'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'ads_banner' , $args );

}

add_action('init', 'ads_banner_posttype_register');







// Custom Taxonomy
 
function add_ads_banner_cat_taxonomies() {
 
        register_taxonomy('ads_banner_cat', 'ads_banner', array(
                // Hierarchical taxonomy (like categories)
                'hierarchical' => true,
                'show_admin_column' => true,
                // This array of options controls the labels displayed in the WordPress Admin UI
                'labels' => array(
                        'name' => _x( 'Banner Categories', 'taxonomy general name' ),
                        'singular_name' => _x( 'Banner Categories', 'taxonomy singular name' ),
                        'search_items' =>  __( 'Search Banner categories' ),
                        'all_items' => __( 'All Banner categories' ),
                        'parent_item' => __( 'Parent Banner categories' ),
                        'parent_item_colon' => __( 'Parent Banner categories:' ),
                        'edit_item' => __( 'Edit Banner categories' ),
                        'update_item' => __( 'Update Banner categories' ),
                        'add_new_item' => __( 'Add Banner categories' ),
                        'new_item_name' => __( 'New Banner categories Name' ),
                        'menu_name' => __( 'Banner categories' ),
						
                ),
                // Control the slugs used for this taxonomy
                'rewrite' => array(
                        'slug' => 'ads_banner_cat', // This controls the base slug that will display before each term
                        'with_front' => false, // Don't display the category base before "/locations/"
                        'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
                ),
        ));
}
add_action( 'init', 'add_ads_banner_cat_taxonomies', 0 );











/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_ads_banner()
	{
		$screens = array( 'ads_banner' );
		foreach ( $screens as $screen )
			{
				add_meta_box('ads_banner_metabox',__( 'Banner Options','ads_banner' ),'meta_boxes_ads_banner_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_ads_banner' );


function meta_boxes_ads_banner_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_ads_banner_input', 'meta_boxes_ads_banner_input_nonce' );
	
	
	$ads_banner_type = get_post_meta( $post->ID, 'ads_banner_type', true );
	$ads_banner_source = get_post_meta( $post->ID, 'ads_banner_source', true );
	$ads_banner_source_html = get_post_meta( $post->ID, 'ads_banner_source_html', true );	
	$ads_banner_target = get_post_meta( $post->ID, 'ads_banner_target', true );
	$ads_banner_target_window = get_post_meta( $post->ID, 'ads_banner_target_window', true );	
	$ads_banner_size = get_post_meta( $post->ID, 'ads_banner_size', true );	
	$ads_banner_size_width = get_post_meta( $post->ID, 'ads_banner_size_width', true );	
	$ads_banner_size_height = get_post_meta( $post->ID, 'ads_banner_size_height', true );
	$ads_banner_geo_country = get_post_meta( $post->ID, 'ads_banner_geo_country', true );		
	

?>




    <div class="para-settings">

        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active">Options</li>
            <li nav="2" class="nav2" >Stats</li>
            <li nav="3" class="nav3">Shortcodes</li>
            <li nav="4" class="nav4">Geo</li>
            <li nav="5" class="nav5">Help & Upgrade</li>            
            
        </ul> <!-- tab-nav end -->
        
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
            
				<div class="option-box">
                    <p class="option-title">Banner Type</p>
                    <p class="option-info"></p>
					<label><input class="ads_banner_type" name="ads_banner_type" type="radio"   value="img" <?php if ($ads_banner_type=="img") echo "checked"; ?> /><?php echo __('Image Banner(.png, .jpg, .jpeg, .gif)'); ?></label><br />

					<label><input class="ads_banner_type" name="ads_banner_type" type="radio" value="swf" <?php if ($ads_banner_type=="swf") echo "checked"; ?>  /><?php echo __('SWF Banner'); ?></label><br />
                    
					<label><input class="ads_banner_type" name="ads_banner_type" type="radio" value="video" <?php if ($ads_banner_type=="video") echo "checked"; ?>  /><?php echo __('Video Banner (youtube only)'); ?></label><br />
                    
					<label><input class="ads_banner_type" name="ads_banner_type" type="radio" value="html" <?php if ($ads_banner_type=="html") echo "checked"; ?>  /><?php echo __('HTML Code'); ?></label><br />        

                </div>

				<div class="option-box">
                    <p class="option-title">Banner Source URL</p>
                    <p class="option-info">Image url or swf file url, or youtube video
                    <br />
                    youtube video format: <br />
                    http://www.youtube.com/v/XGSy3_Czz8k
                    </p>
					

                    
            		<input class="ads_banner_source"  type="text" size='40' placeholder="http://example.com/content/banner.png" name="ads_banner_source" value="<?php if ( isset( $ads_banner_source ) ) echo $ads_banner_source; ?>" />
                    <textarea style="display:none;" cols="40" class="ads_banner_source_html" name="ads_banner_source_html" placeholder="html code here"><?php if ( isset( $ads_banner_source_html ) ) echo $ads_banner_source_html; ?></textarea>
                </div>
                
				<div class="option-box">
                    <p class="option-title">Target URL</p>
                    <p class="option-info"></p>
					
            		<input  type="text" size='40' placeholder="http://example.com/landing/" name="ads_banner_target" value="<?php if ( isset( $ads_banner_target ) ) echo $ads_banner_target; ?>" />
                </div>
                
                
                
				<div class="option-box">
                    <p class="option-title">Target Window</p>
                    <p class="option-info"></p>
                    <select name="ads_banner_target_window" >
                            <option value='_blank' <?php if ($ads_banner_target_window=="_blank") echo "selected"; ?> >New Window</option>
                            <option value='_self' <?php if ($ads_banner_target_window=="_self") echo "selected"; ?> >Same Window</option>
                     </select>

                </div>


				<div class="option-box">
                    <p class="option-title">Banner Size:</p>
                    <p class="option-info"></p>
                   	<select id="ads_banner_size" name="ads_banner_size" >
                    <option value='' <?php if ($ads_banner_size=="") echo "selected"; ?> >Custom</option>
                        <optgroup label="Medium Rectangle" >
                            <option value='300,250' <?php if ($ads_banner_size=="300,250") echo "selected"; ?> >300x250</option>
                        </optgroup>
                        <optgroup label="Square Pop-Up" >
                            <option value='250,250' <?php if ($ads_banner_size=="250,250") echo "selected"; ?> >250x250</option>
                        </optgroup>
                        <optgroup label="Vertical Rectangle" >
                            <option value='240,400' <?php if ($ads_banner_size=="240,400") echo "selected"; ?> >240x400</option>
                        </optgroup>
                        <optgroup label="Large Rectangle" >
                            <option value='336,280' <?php if ($ads_banner_size=="336,280") echo "selected"; ?> >336x280</option>
                        </optgroup>
                        <optgroup label="Rectangle" >
                            <option value='180,150' <?php if ($ads_banner_size=="180,150") echo "selected"; ?> >180x150</option>
                        </optgroup>
                        <optgroup label="3:1 Rectangle" >
                            <option value='300,100' <?php if ($ads_banner_size=="300,100") echo "selected"; ?> >300x100</option>
                        </optgroup>
                        <optgroup label="Pop-Under" >
                            <option value='720,300' <?php if ($ads_banner_size=="720,300") echo "selected"; ?> >720x300</option>
                        </optgroup>
                        <optgroup label="Full Banner" >
                            <option value='468,60' <?php if ($ads_banner_size=="468,60") echo "selected"; ?> >468x60</option>
                        </optgroup>
                        <optgroup label="Half Banner" >
                            <option value='234,60' <?php if ($ads_banner_size=="234,60") echo "selected"; ?> >234x60</option>
                        </optgroup>
                        <optgroup label="Micro Bar" >
                            <option value='88,31' <?php if ($ads_banner_size=="88,31") echo "selected"; ?> >88x31</option>
                        </optgroup>
                        <optgroup label="Button 1" >
                            <option value='120,90' <?php if ($ads_banner_size=="120,90") echo "selected"; ?> >120x90</option>
                        </optgroup>
                        <optgroup label="Button 2" >
                            <option value='120,60' <?php if ($ads_banner_size=="120,60") echo "selected"; ?> >120x60</option>
                        </optgroup>
                        <optgroup label="Vertical banner" >
                            <option value='120,240' <?php if ($ads_banner_size=="120,240") echo "selected"; ?> >120x240</option>
                        </optgroup>
                        <optgroup label="Square button" >
                            <option value='125,125' <?php if ($ads_banner_size=="125,125") echo "selected"; ?> >125x125</option>
                        </optgroup>
                        <optgroup label="Leaderboard" >
                            <option value='728,90' <?php if ($ads_banner_size=="728,90") echo "selected"; ?> >728x90</option>
                        </optgroup>
                        <optgroup label="Wide skyscraper" >
                            <option value='160,600' <?php if ($ads_banner_size=="160,600") echo "selected"; ?> >160x600</option>
                        </optgroup>
                        <optgroup label="Skyscraper" >
                            <option value='120,600' <?php if ($ads_banner_size=="120,600") echo "selected"; ?> >120x600</option>
                        </optgroup>
                        <optgroup label="Half page ad" >
                            <option value='300,600' <?php if ($ads_banner_size=="300,600") echo "selected"; ?> >300x600</option>
                        </optgroup>
                    </select>
                    <br /><br />
                    <label> Width(px):<br />
            		<input id="ads_banner_size_width"  type="text" size='10' placeholder="120" name="ads_banner_size_width" value="<?php if ( isset( $ads_banner_size_width ) ) echo $ads_banner_size_width; ?>" />
                    </label>
                    <br />
                    <label> Height(px):<br />
            		<input  id="ads_banner_size_height" type="text" size='10' placeholder="600" name="ads_banner_size_height" value="<?php if ( isset( $ads_banner_size_height ) ) echo $ads_banner_size_height; ?>" />      
                    </label>
                     
                </div>



            </li>
            <li style="display: none;" class="box2 tab-box">
            
           		<div class="para-dashboard">
                    <div class="dash-box">
                        <div class="dash-box-title"><span class="para-icons user-crowd">Total Click</span></div>
                        <div class="dash-box-info">Total Banner Click for this Banner</div>
                        <div class="total-online">
						<?php
							$postid = get_the_ID();
							global $wpdb;
							$result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}bar_info WHERE event='click' AND bannerid=$postid", ARRAY_A);
							$total_click = $wpdb->num_rows;
							echo $total_click;
                        ?>
                        </div>
                    </div>
                    <div class="dash-box">
                        <div class="dash-box-title"><span class="para-icons user-crowd">Total Serve</span></div>
                        <div class="dash-box-info">Total Banner Serve for this Banner</div>
                        <div class="total-online">
						<?php
							$postid = get_the_ID();
							global $wpdb;
							$result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}bar_info WHERE event='serve' AND bannerid=$postid", ARRAY_A);
							$total_click = $wpdb->num_rows;
							echo $total_click;
                        ?>
                        </div>
                    </div>
                </div>
            
            
				<div class="option-box">
                    <p class="option-title">Event Stats</p>
                    <p class="option-info"></p>
                    
                    
<div id="bar-events">

        <?php $postid = get_the_ID();

		$bar_recent_items = isset( $_GET['bar_recent_items'] ) ? $_GET['bar_recent_items'] : 10;
		$bar_event = isset( $_GET['bar_event'] ) ? $_GET['bar_event'] : "serve";
		 ?>
        
    <select  name="bar_recent_items" class="bar-recent-items" >
    	
    	<option <?php if($bar_recent_items=="10") echo "selected='selected'" ?>  value="10" >10 Items</option>
    	<option <?php if($bar_recent_items=="20") echo "selected='selected'" ?>  value="20" >20 Items</option>
    	<option <?php if($bar_recent_items=="50") echo "selected='selected'" ?>  value="50" >50 Items</option>
    	<option <?php if($bar_recent_items=="100") echo "selected='selected'" ?>  value="100" >100 Items</option>
    	<option <?php if($bar_recent_items=="500") echo "selected='selected'" ?>  value="500" >500 Items</option>
	</select>
    
    <select name="bar_event" class="bar-event" >
    	<option <?php if($bar_event=="click") echo "selected='selected'" ?>  value="click" >Click</option>
    	<option <?php if($bar_event=="serve") echo "selected='selected'" ?>  value="serve" >Serve</option>
	</select>    
    
    <div style="display:inline;" class="button bar-update-sats" >Submit</div>
	<script>
    jQuery(document).ready(function() {
        
	
	jQuery(".bar-update-sats").click(function(){

			var bar_recent_items = jQuery(".bar-recent-items").val();
			var bar_event = jQuery(".bar-event").val();

			
			location = "<?php echo get_admin_url(); ?>post.php?post=<?php echo $postid; ?>&action=edit&bar_recent_items="+bar_recent_items+"&bar_event="+bar_event+"#bar-events";
			})
			
		})
	
	
	
	
	
    </script>
    
        
<?php
	global $wpdb;
	$bar_event = isset( $_GET['bar_event'] ) ? $_GET['bar_event'] : "click";
	$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
	
	$limit = isset( $_GET['bar_recent_items'] ) ? absint( $_GET['bar_recent_items'] ) : 10;
	$offset = ( $pagenum - 1 ) * $limit;
	$entries = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}bar_info WHERE event='$bar_event' AND bannerid=$postid ORDER BY id DESC LIMIT $offset, $limit" );
 

 
?>  
      
<table class="widefat bar-events" id="" >
    <thead>
        <tr>
            <th scope="col" class="manage-column column-name" style=""><strong>Event</strong></th>
            <th scope="col" class="manage-column column-name" style=""><strong>Date & Time</strong></th>            
            <th scope="col" class="manage-column column-name" style=""><strong>Country</strong></th>
            <th scope="col" class="manage-column column-name" style=""><strong>City</strong></th>
            <th scope="col" class="manage-column column-name" style=""><strong>Browser</strong></th>
            <th scope="col" class="manage-column column-name" style=""><strong>Platform</strong></th> 
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th scope="col" class="manage-column column-name" style=""><strong>Event</strong></th>
            <th scope="col" class="manage-column column-name" style=""><strong>Date & Time</strong></th> 
            <th scope="col" class="manage-column column-name" style=""><strong>Country</strong></th>
            <th scope="col" class="manage-column column-name" style=""><strong>City</strong></th>
            <th scope="col" class="manage-column column-name" style=""><strong>Browser</strong></th>
            <th scope="col" class="manage-column column-name" style=""><strong>Platform</strong></th> 
        </tr>
    </tfoot>
        
        
        
	<tbody>
        <?php if( $entries ) { ?>
 
            <?php
            $count = 1;
            $class = '';
            foreach( $entries as $entry ) {
                $class = ( $count % 2 == 0 ) ? ' class="alternate"' : '';
            ?>
 
            <tr<?php echo $class; ?>>
                <td><?php echo	$entry->event; ?></td>
                <td><?php echo	$entry->date." ".$entry->time;  ?></td>                
                <td><?php echo	$entry->country; ?></td>   
                <td><?php echo	$entry->city; ?></td>
                <td><?php
echo '<span class="browser '.$entry->browser.'" title="Browser: '.$entry->browser.'">'.$entry->browser.'</span>';
				 ?></td>
                <td><?php echo	"<span class='platform ".$entry->platform."' title='Operating System:".$entry->platform."'>".$entry->platform."</span>"; ?>
                
                
                </td>                
                            
            </tr>
 
            <?php
                $count++;
            }
            ?>
 
        <?php } else { ?>
        <tr>
            <td colspan="2">No Data</td>
        </tr>
        <?php } ?>
	</tbody> 
</table>  
        
<?php
 
$total = $wpdb->get_var( "SELECT COUNT(`id`) FROM {$wpdb->prefix}bar_info  WHERE event='$bar_event' AND bannerid=$postid" );
$num_of_pages = ceil( $total / $limit );
$page_links = paginate_links( array(
    'base' => add_query_arg( 'pagenum', '%#%#bar-events' ),
    'format' => '',
    'prev_text' => __( '&laquo;', 'aag' ),
    'next_text' => __( '&raquo;', 'aag' ),
    'total' => $num_of_pages,
    'current' => $pagenum
) );
 
if ( $page_links ) {
    echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
}








?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                </div>
            
            </li>
            <li style="display: none;" class="box3 tab-box">

            
            
            
            
            
				<div class="option-box">
                    <p class="option-title">Only This Banner</p>
                    <p class="option-info"></p>
					<input size='30' onClick="this.select();" type='text' value='<?php echo '[bar id="'.get_the_ID().'"]'; ?>' /><br /><br />
                </div>
            
				<div class="option-box">
                    <p class="option-title">Banner Categories</p>
                    <p class="option-info"></p>
                    <?php
                    $terms = wp_get_post_terms( get_the_ID(), 'ads_banner_cat', array("fields" => "ids") );
					
					
					?>
					<input size='30' onClick="this.select();" type='text' value='<?php echo '[bar group="'.implode(',',$terms).'"]'; ?>' />
                </div> 
            
            
            
            
            
            
            
            
            
            
            
            </li>
            
           	<li style="display: none;" class="box4 tab-box">
				<div class="option-box">
                    <p class="option-title">Countries</p>
                    <p class="option-info">Block conuntry for this banner.</p>
                    <?php
                    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
  
					
										
					foreach ( $countries as $country ) {
					
					   echo '<label><input type="checkbox" name="ads_banner_geo_country['.$country.']"  value ="'.$country.'" ' ?> 
					   <?php if ( isset( $ads_banner_geo_country[$country] ) ) echo "checked"; ?>
					   <?php echo' >'. $country.'</label><br />' ;
					}
										
					
					
					
					
					
					
					
					
					
					?>
                    
                    
                    
                    
                </div> 
            
            
            </li>
            <li style="display: none;" class="box5 tab-box">
				<div class="option-box">
                    <p class="option-title">Need Help ?</p>
                    <p class="option-info">Feel free to contact with any issue for this plugin, Ask any question via forum <a href="<?php echo bar_qa_url; ?>"><?php echo bar_qa_url; ?></a> <strong style="color:#139b50;">(free)</strong><br />
                    
                    
                    

    <?php
    $bar_customer_type = get_option('bar_customer_type');
    $bar_version = get_option('bar_version');

    if($bar_customer_type=="free")
        {
    
            echo 'You are using <strong> '.$bar_customer_type.' version  '.$bar_version.'</strong> of <strong>'.bar_plugin_name.'</strong>, To get more feature you could try our premium version. ';
            
            echo '<br /><a href="'.bar_pro_url.'">'.bar_pro_url.'</a>';
            
        }
    else
        {
    
            echo 'Thanks for using <strong> premium version  '.$bar_version.'</strong> of <strong>'.bar_plugin_name.'</strong> ';	
            
            
        }
    
     ?>       

                    </p>
                </div>
                
				<div class="option-box">
                    <p class="option-title">Submit Reviews...</p>
                    <p class="option-info">We are working hard to build some awesome plugins for you and spend thousand hour for plugins. we wish your three(3) minute by submitting five star reviews at wordpress.org. if you have any issue please submit at forum.</p>
                	<img src="<?php echo bar_plugin_url."css/five-star.png";?>" /><br />
                    <a target="_blank" href="<?php echo bar_wp_reviews_url; ?>">
                		<?php echo bar_wp_reviews_url; ?>
               		</a>
                </div>
				<div class="option-box">
                    <p class="option-title">Please Share</p>
                    <p class="option-info">If you like this plugin please share with your social share network.</p>
                    <?php
                    
						echo bar_share_plugin();
					?>
                </div>
                
<!-- 
				<div class="option-box">
                    <p class="option-title">Video Tutorial</p>
                    <p class="option-info">Please watch this video tutorial.</p>
                	<iframe width="640" height="480" src="<?php echo bar_tutorial_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                </div>



               
               
<?php
    if($bar_customer_type=="free")
        {	
?>
                
                
				<div class="option-box">
                    <p class="option-title">Comparison</p>
                    <p class="option-info">You could try our premium version for more features.</p>
                    <a target="_blank" href="<?php echo bar_pro_url; ?>">
                	<img  src="<?php echo bar_plugin_url."css/bar-pro-pricing.png";?>" />
               		</a>
             </div>  
<?php    
		}

?>
               

        -->            
                
                
                
            
            </li>
            
        </ul>
        


    </div> <!-- para-settings -->



<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_ads_banner_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_ads_banner_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_ads_banner_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_ads_banner_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$ads_banner_type = sanitize_text_field( $_POST['ads_banner_type'] );	
	$ads_banner_source = sanitize_text_field( $_POST['ads_banner_source'] );
	$ads_banner_source_html = stripslashes( $_POST['ads_banner_source_html'] );	
	$ads_banner_target = sanitize_text_field( $_POST['ads_banner_target'] );
	$ads_banner_target_window = sanitize_text_field( $_POST['ads_banner_target_window'] );	
	$ads_banner_size = sanitize_text_field( $_POST['ads_banner_size'] );	
	$ads_banner_size_width = sanitize_text_field( $_POST['ads_banner_size_width'] );	
	$ads_banner_size_height = sanitize_text_field( $_POST['ads_banner_size_height'] );	
	
	if(empty($_POST['ads_banner_geo_country'])){
		$ads_banner_geo_country = array();
		
		}
	else{
		$ads_banner_geo_country = stripslashes_deep( $_POST['ads_banner_geo_country'] );
		}
	
	

  // Update the meta field in the database.
	update_post_meta( $post_id, 'ads_banner_type', $ads_banner_type );	
	update_post_meta( $post_id, 'ads_banner_source', $ads_banner_source );
	update_post_meta( $post_id, 'ads_banner_source_html', $ads_banner_source_html );	
	update_post_meta( $post_id, 'ads_banner_target', $ads_banner_target );
	update_post_meta( $post_id, 'ads_banner_target_window', $ads_banner_target_window );	
	update_post_meta( $post_id, 'ads_banner_size', $ads_banner_size );
	update_post_meta( $post_id, 'ads_banner_size_width', $ads_banner_size_width );
	update_post_meta( $post_id, 'ads_banner_size_height', $ads_banner_size_height );
	update_post_meta( $post_id, 'ads_banner_geo_country', $ads_banner_geo_country );



}
add_action( 'save_post', 'meta_boxes_ads_banner_save' );


























?>