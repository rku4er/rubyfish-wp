<?php

    use Roots\Sage\Utils;

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
            <div class="hero-text-inner">
                <div class="brand-holder">
                    <svg class="brand-logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39px" height="23px" viewBox="0 0 39 23" enable-background="new 0 0 39 23" xml:space="preserve">
                        <path d="M28.65,0H4.61l10.35,11.5L4.61,23H28.65L39,11.5L28.65,0z M27,3h0.31l6.311,7H27V3z M24,20H11.35l6.3-7H24V20z M24,10h-6.35 l-6.3-7H24V10z M27.31,20H27v-7h6.62L27.31,20z M0,1v21l9.62-10.5L0,1z M3,9l2.38,2.5L3,14V9z"/>
                    </svg>
                    <p class="brand-name"><?php bloginfo('name'); ?></p>
                </div>
                <h2 class="entry-title"><?php echo ucfirst(strtolower(get_post_type($post))) . '&nbsp;' . get_the_title(); ?></h2>
                <p><?php echo get_the_date('j F Y'); ?></p>
                <p>Copyright &copy;<?php echo get_the_date('Y') . '&nbsp;' . __('Rubyfish Digital', 'sage');?></p>
            </div>
        </div>

        <a id="scroll-to-content" href="#main"><span class="icon-arrow-down"></span></a>

    </div>

<?php } ?>

  <div id="main" class="page-single-project">

    <div class="download-bar">
        <svg class="downbar-logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39px" height="23px" viewBox="0 0 39 23" enable-background="new 0 0 39 23" xml:space="preserve">
            <path d="M28.65,0H4.61l10.35,11.5L4.61,23H28.65L39,11.5L28.65,0z M27,3h0.31l6.311,7H27V3z M24,20H11.35l6.3-7H24V20z M24,10h-6.35 l-6.3-7H24V10z M27.31,20H27v-7h6.62L27.31,20z M0,1v21l9.62-10.5L0,1z M3,9l2.38,2.5L3,14V9z"/>
        </svg>
        <p><b><?php echo ucfirst(strtolower(get_post_type($post))) . '&nbsp;' . get_the_title(); ?> &bull;</b> <?php echo get_the_date('j F Y'); ?></p>
        <?php $fileUrl = function_exists('get_field') ? get_field('attachment_file') : ''; ?>
        <div class="attachment"><?php echo $fileUrl ? '<a href="'. $fileUrl .'" title="Download PDF">Download PDF <i class="icon-file-pdf"></i></a>' : '';  ?></div>
    </div>

    <div class="container">

        <div class="row">

          <div class="col-md-12">

            <?php while (have_posts()) : the_post(); ?>
              <article <?php post_class(); ?>>

                <div class="entry-content">

                  <div class="post-padding"><?php the_content(); ?></div>

                  <div class="like-post-cnt">

                    <div class="like-post">

                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="89" height="89" viewBox="0 0 89 89">
                          <image xlink:href="data:img/png;base64,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" width="89" height="89"/>
                        </svg>
                      </a>

                    </div>
                    <p class="like-counter">23 Likes</p>

                      <div class="like-under-the-hood">
                          <?php
                          if(function_exists('like_counter_p')) { like_counter_p(''); }
                          ?>
                      </div>

                  </div>

                </div>


                  <?php
                  $prev = Utils\mod_get_adjacent_post('prev', array('project'));

                  if( $prev ) {

                      $image_url = wp_get_attachment_url( get_post_thumbnail_id($prev->ID) );

                      ?>
                      <div class="post-pagination" style="background:url( <?php echo $image_url; ?>) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">


                          <div class="next-post">
                              <a href="<?php echo get_permalink($prev->ID)?>">
                                <span class="text-bold">Next</span><br>
                                <?php echo $prev->post_title; ?>
                                <br><span class="icon-arrow-down2"></span>
                              </a>
                          </div>

                      </div>

                  <?php } ?>

              </article>
            <?php endwhile; ?>

          </div>
      </div>

    </div>

  </div>
