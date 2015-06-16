<div id="skrollr-body">

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

 <div id="main" class="site-main">

    <div class="container offset-top-70 page-template-template-blog-php page-template-template-tags">

        <?php get_template_part('templates/page', 'header'); ?>

        <!-- Articles list -->
        <div id="content" class="site-content" role="main">

            <div class="row">

                <div class="col-sm-6 col-xs-12">

                <?php

                    while (have_posts()) :

                        the_post();
                        if ($wp_query->current_post % 2 == 0):

                            if(get_post_type() == 'work')
                            {
                                get_template_part('templates/content-work', get_post_format());
                            }
                            else
                            {
                                get_template_part('templates/content-blog', get_post_format());
                            }

                        endif;

                    endwhile;

                ?>

                </div>

                <div class="col-sm-6 col-xs-12">

                    <?php
                    // This will reset the loop counter and allow you to do another loop.
                    rewind_posts();

                    while (have_posts()) :

                        the_post();
                        if ($wp_query->current_post % 2 !== 0):

                            if(get_post_type() == 'work')
                            {
                                get_template_part('templates/content-work', get_post_format());
                            }
                            else
                            {
                                get_template_part('templates/content-blog', get_post_format());
                            }

                        endif;

                    endwhile;

                    ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'sage')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'sage')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
