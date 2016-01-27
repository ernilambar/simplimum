<?php
/**
 * The main template file.
 *
 * @package Simplimum
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php if ( ! is_singular() ) : ?>
                        <?php the_post_thumbnail( 'thumbnail' ); ?>
                    <?php else : ?>
                        <?php the_post_thumbnail( 'full' ); ?>
                    <?php endif ?>
                <?php endif; ?>

                <?php the_excerpt(); ?>
                <?php wp_link_pages(); ?>
            </article>

            <?php if ( is_singular() ) : ?>
            <?php the_post_navigation(); ?>
            <?php endif; ?>

            <?php if ( is_singular() ) : ?>
            <?php comments_template(); ?>
            <?php endif; ?>

        <?php endwhile; ?>

	<?php else : ?>

        <p>Not Found</p>

	<?php endif; ?>

    <?php the_posts_pagination(); ?>

<?php get_footer();?>
