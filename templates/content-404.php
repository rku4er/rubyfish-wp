<article <?php post_class(); ?>>


    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail('blog-circle-thumb');
            }
        ?>
        <br/>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </a>
    </div>

</article>