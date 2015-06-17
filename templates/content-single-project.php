<?php use Roots\Sage\Utils; ?>
<div id="skrollr-body">

  <div class="container page-single-post offset-top-70">

    <div class="row">

      <div class="col-md-12">

        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class(); ?>>

            <div class="entry-content">


                <div class="tag-links">
                    <?php the_tags('','',''); ?>
                </div>

              <h1 class="entry-title"><?php echo __('Project', 'sage') . '&nbsp;' . get_the_title(); ?></h1>
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
