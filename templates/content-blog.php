<article <?php post_class(); ?>>

    <div class="entry-content">

        <div class="tag-links">
        
            <?php the_tags('','',''); ?>
        
        </div>

        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>

    </div>

    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php
                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail('blog-circle-thumb');
                }
            ?>
        </a>
    </div>

    <div class="read-more">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <span class="icon-plus"></span><span class="read-more-text"> Read more</span>
        </a>
    </div>

</article>