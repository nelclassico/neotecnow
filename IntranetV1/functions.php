<?php


function add_theme_menu_item()
{
	add_menu_page("Intranet Settings", "Intranet Settings", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");



function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Intranet Options </h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}



function display_engynn_api()
{
	?>
    	<input type="text" name="engynn_api" id="engynn_api" value="<?php echo get_option('engynn_api'); ?>" /> <Br />
    	Retrieved from <a target="_blank" href="https://engynn-intranet.com/free-wordpress-intranet-template/">engynn-intranet.com</a> when you downloaded.
    <?php
}


function display_organization_name_element()
{
	?>
    	<input type="text" name="organization_name" id="organization_name" value="<?php echo get_option('organization_name'); ?>" />
    <?php
}


function display_logo_element()
{
	?>
    	<input type="text" name="logo_url" id="logo_url" value="<?php echo get_option('logo_url'); ?>" /><Br />
    	Upload to media library and paste URL here. Leave blank and company name will be used in header.
    <?php
}


function display_organization_color()
{
	?>	
			<input type="color"  name="organization_color" id="organization_color" value="<?php echo get_option('organization_color'); ?>"> <Br />
    		Will change header font color.
    <?php
}


function display_menu(){

	$data = array("key" => get_option('engynn_api') );                                                                    
	$data_string = json_encode($data);                                                                                                                                                                                                        
	$ch = curl_init('https://engynn-intranet.com/api/validate-api.php?key='.get_option('engynn_api') );                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
	    'Content-Type: application/json',                                                                                
	    'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                                                                                                                                    
	$result = curl_exec($ch);
	$success=json_decode($result,true)['success'];

	if (!get_option('engynn_api')){
		die("<div class='error'> <h1> Error </h1> Please enter your api key into intranet settings in wp-admin. <br /> Not sure what this is? Continue to intranet panel for instructions on obtaining a free intranet key. </div> ");
	}

	if ($success!=true){
		die("<div class='error'> <h1> Error </h1> Your api key is invalid.  </div> ");
	}

}


function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	

	add_settings_field("engynn_api", "Api Key", "display_engynn_api", "theme-options", "section");
	add_settings_field("organization_name", "Organization Name", "display_organization_name_element", "theme-options", "section");
    add_settings_field("logo_url", "Logo Url", "display_logo_element", "theme-options", "section");
    add_settings_field("organization_color", "Organization Color", "display_organization_color", "theme-options", "section");

    register_setting("section", "engynn_api");
    register_setting("section", "organization_name");
    register_setting("section", "logo_url");
    register_setting("section", "organization_color");
}

add_action("admin_init", "display_theme_panel_fields");


?>