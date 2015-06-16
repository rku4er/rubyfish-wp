<?php 
    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

    	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

     ?> <div class="parallax-image-wrapper" data-anchor-target=".hero-bg" data-bottom-top="transform:translate3d(0px, 200%, 0px)" data-top-bottom="transform:translate3d(0px, 0%, 0px)">

        	<div class="parallax-image" style="background-image:url(<?php echo $url; ?>);" data-anchor-target=".hero-bg" data-bottom-top="transform: translate3d(0px, -70%, 0px);"
    			  data-top-bottom="transform: translate3d(0px, 70%, 0px);"></div>
            
    	</div>

	<?php } ?>


	
    	<div id="skrollr-body">

		<?php if ( has_post_thumbnail() ) { ?>

	        <div id="hero">

	            <div class="hero-bg" style="background-image:url(<?php echo $url; ?>);"></div>

	            <div class="hero-text">
	                <h2><?php echo get_post(get_post_thumbnail_id())->post_content; ?></h2>
	                <p><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
	            </div>

	            <a id="scroll-to-content" href="#main"><span class="icon-arrow-down"></span></a>
	 
	        </div>

		<?php } ?>

    		<div id="main" class="site-main">
	
    	        <div class="container page-about">

        	        <div id="content" class="site-content" role="main">
    
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

					</div>

				</div>

			</div>