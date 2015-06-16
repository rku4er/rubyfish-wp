

<div id="skrollr-body page-404-body">

    <div class="container page-404 offset-top-70">
        <div class="shading"></div>

        <div class="row">

            <div class="col-md-12">

                <h1>Oh no!</h1>
                <p>404 error. Either we broke something or you can't type. Here's something interesting anyway:</p>

                <div class="something-else">

                    <?php query_posts('orderby=rand&showposts=1'); ?>

                    <?php

                    while (have_posts()) :

                        the_post();
                        if ($wp_query->current_post % 1000 == 0):

                            get_template_part('templates/content-404', get_post_format());

                        endif;

                    endwhile;

                    ?>

                </div>


            </div>

        </div>

    </div>
</div>