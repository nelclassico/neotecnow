<?php
require_once(ABSPATH . 'wp-load.php');
?>
<?php 
if ($_POST['liu']):
	$credentials = array(
        'user_login'    => $_POST['liu'],
        'user_password' => $_POST['lip']
    );
	if (wp_signon( $credentials)){
			wp_redirect( get_site_url() );
	}
endif;
if ($_GET['logout']):
wp_logout();
wp_redirect(get_site_url());
endif;
?>
<head>
	<?php 
	 wp_head(); 
	?>
	<meta 
	     name='viewport' 
	     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
	/>

	<title> <?php echo get_the_title();?> </title>
	<meta name="title" content="Loyalty Web Panel">


	<link rel="icon" 
      type="image/png" 
      href="<?php echo get_site_url();?>/wp-content/themes/IntranetV1/assets/img/lock.png">
      

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/css/uikit.min.css" />

	<!-- UIkit JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/js/uikit-icons.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">


	<?php include 'style.php'; 	 display_menu();?>
	<?php if (!is_user_logged_in()){  include 'login.php'; die();  } ?>
	

	
		
</head>

<body class="intranet-body">
<?php
$name=get_option('organization_name');
$logo=get_option('logo_url');
?>
<div class="header">
	<div uk-grid>
				<div class="uk-width-1-4@m uk-width-1-2">
						<?php if ($logo){?> <a href="<?php echo get_site_url();?>">  <img src="<?php echo $logo;?>" class="logo"> </a>  <?php } ?>
						<?php if (!$logo){?>  <div class="logo-text"> <a href="<?php echo get_site_url();?>"> <?php print_r(get_bloginfo());?> </a> </div> <!-- logo text--> <?php } ?>
						<div class="small"> INTRANET </div>
				</div> <!-- 1/2 -->
				<div class="uk-width-3-4 uk-text-right main-menu-col uk-visible@m">
						<?php echo wp_nav_menu();?>
				</div> <!-- 1/2 -->
				<div class="uk-width-1-2 uk-text-right mobile-menu-col uk-hidden@m">
						<span uk-icon="icon: menu; ratio: 2" uk-toggle="target: #offcanvas-usage"></span>
				</div> <!-- 1/2 -->

	</div> <!-- grid -->
</div> <!-- header -->

<div id="offcanvas-usage" uk-offcanvas>
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <h3>Main Menu</h3>
        <?php echo wp_nav_menu();?>
    </div>
</div>
<script>	
$(document).ready(function(){
	$("#menu-main-menu").append('<li id="menu-item-99" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-6"><a href="<?php echo get_site_url();?>?logout=t" aria-current="page">Log Out</a></li>');
});
</script>