<?php get_header(); ?>



<div class="uk-container">

	<h1> <?php single_cat_title(); ?></h1>

	<?php $catid= get_the_category()->id;?>

			<?php
				$args = array(
				  'numberposts' => 500,
				  'category'=>$catid
				);

				$posts = get_posts( $args );
				?>

							<?php foreach ($posts as $post){?>	 
									<a href="<?php echo get_site_url();?>?p=<?php echo $post->ID;?>" style="text-decoration: none!important;"> <h3 class="uk-text-left"> <?php echo $post->post_title;?></h3> </a>
									<strong> <?php echo $post->post_date;?></strong> <Br /> <hr /> <Br />
							<?php } ?>


</div>

