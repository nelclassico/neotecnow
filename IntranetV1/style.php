<style>
	
	body {
	    margin-top: -37px;
	    background: #eaebef;
	}

	.logo{
		max-height: 50px;
		margin-bottom: 10px;
	}

	.intranet-body .uk-container{
		 margin-top: 57px;
		background: white;
		padding-top: 25px;
		padding-bottom: 25px;
		border: 1px solid #c6c6c6;
	}

	.sign-in-input{
		padding-left: 40px!important;
	}

	.header{
		background: black;
		padding: 15px 25px 15px 25px;
		color: white;
		position: fixed;
		top:0;
		width: 100%;
		-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
		-moz-box-sizing: border-box;    /* Firefox, other Gecko */
		box-sizing: border-box; 
	}

	.logo-text{
		font-size: 25px;
		font-weight: 600;
	}

	.logo-text a{
		color: white;
		text-decoration: unset;
	}

	.small{
		font-size: 12px;
	}


	.main-menu-col{
		padding-top: 10px;	
	}

	.main-menu-col li{
		color: <?php echo get_option('organization_color'); ?>!important;
		display: inline;
		margin-right: 5px;
		margin-left: 5px;

	}

	.main-menu-col a{
		color: white;
	}

	h1,h2,h3,h4{
		font-weight: 800;
		color:<?php echo get_option('organization_color'); ?>;
	}

	h1{
		margin-top: 50px;
	}


	.uk-button, .uk-button:hover{
		background: <?php echo get_option('organization_color'); ?>!important;
	}


	.error{
		position:fixed;
	    padding:0;
	    margin:0;

	    top:0;
	    left:0;

	    width: 100%;
	    height: 100%;
	    background: black;
	    text-align: center;
	    color: white;
	}

</style>