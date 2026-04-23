<?php
/**
 * single.php - Single Post Template
 * Displays individual blog posts.
 */
get_header();
?>

<main>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="page-header">
        <div class="container" style="max-width: 900px;">
            <p class="eyebrow" style="margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; color: var(--color-primary-light);"><?php echo get_the_date(); ?></p>
            <h1 style="margin-bottom: 1rem;"><?php the_title(); ?></h1>
            <p class="page-subtitle">By <?php the_author(); ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container" style="max-width: 800px;">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-featured-image" style="margin-bottom: 3rem; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-md);">
                    <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto; display: block;']); ?>
                </div>
            <?php endif; ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="line-height: 1.8; color: var(--color-text); font-size: 1.1rem;">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                
                <div class="post-footer" style="margin-top: 5rem; padding-top: 2rem; border-top: 1px solid var(--color-sand);">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 2rem;">
                        <div class="post-tags">
                            <?php if ( has_tag() ) : ?>
                                <span style="font-size: 0.9rem; font-weight: 600; color: var(--color-charcoal); margin-right: 0.5rem;">Tags:</span>
                                <?php the_tags('', '', ''); ?>
                            <?php endif; ?>
                        </div>
                        <div class="post-share" style="display: flex; align-items: center; gap: 1.5rem;">
                            <span style="font-size: 0.95rem; color: var(--color-text-light); font-weight: 500;">Share this story:</span>
                            <div style="display: flex; gap: 0.75rem;">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" title="Share on X"><i class="fab fa-x-twitter"></i></a>
                                <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>" target="_blank" title="Share on Pinterest"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <nav class="post-navigation" style="margin-top: 4rem; display: flex; justify-content: space-between; border-top: 1px solid var(--color-sand); padding-top: 2rem;">
                <div class="nav-previous"><?php previous_post_link('%link', '<i class="fas fa-chevron-left"></i> Previous Post'); ?></div>
                <div class="nav-next"><?php next_post_link('%link', 'Next Post <i class="fas fa-chevron-right"></i>'); ?></div>
            </nav>
        </div>
    </section>
<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
