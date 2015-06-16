<?php
/*
Template Name: Work
*/
?>
<div class="parallax-image-wrapper" data-anchor-target=".hero-bg" data-bottom-top="transform:translate3d(0px, 200%, 0px)" data-top-bottom="transform:translate3d(0px, 0%, 0px)">

    <div class="parallax-image" style="background-image:url(http://d2gawdwh5o4in5.cloudfront.net/wp-content/themes/rubyfish/assets/img/HeroWork.jpg)" data-anchor-target=".hero-bg" data-bottom-top="transform: translate3d(0px, -60%, 0px);"
        data-top-bottom="transform: translate3d(0px, 60%, 0px);"></div>

</div>


<div id="skrollr-body">

    <div class="hero-bg" style="background-image:url(http://d2gawdwh5o4in5.cloudfront.net/wp-content/themes/rubyfish/assets/img/HeroWork.jpg);"></div>

    <div id="hero">

        <div class="hero-text">
            <h2><span>You have to finish things - that’s what you learn from, you learn by finishing things.</span></h2>
            <p>Neil Gaiman</p>
        </div>

        <!--div id="scroll-to-content"-->
            <a id="scroll-to-content" href="#main"><span class="icon-arrow-down"></span></a>
        <!--/div-->

    </div>


<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

 <div id="main" class="site-main">

    <div class="container">

        <!-- Articles list -->
        <div id="content" class="site-content" role="main">

            <div class="row">

                <div class="col-sm-6 col-xs-12">

                <?php

                    $pitem_counter = 0;

                    // get portfolio items
                    $wp_query = new WP_Query();
                    $wp_query->query('post_type=work&posts_per_page=-1');

                    while (have_posts()) :

                        the_post();
                        if ($wp_query->current_post % 2 == 0):

                            get_template_part('templates/content-work', get_post_format());

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

                            get_template_part('templates/content-work', get_post_format());

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
