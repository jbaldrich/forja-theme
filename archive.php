<?php
get_header();
?>

<main id="site-content" role="main">

    <?php

    if (class_exists(FacetWP::class) && is_archive('tutorials') && !is_category()) {
        echo do_shortcode('[facetwp facet="tutoriales_filtro"]');
    }

    ?>

    <div class="grid-container">
        <?php while ( have_posts() ): the_post(); ?>
            <article>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            </article>
        <?php endwhile; ?>
    </div>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
