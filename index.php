<?php
/**
 * index.php - Blog Index Template
 * Displays the list of latest posts.
 */
get_header();
?>

<main>
<section class="page-header">
    <div class="container">
        <h1>Bethany's Blog</h1>
        <p class="page-subtitle">Thoughts, music updates, and behind-the-scenes stories</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="post-card" style="background: #fff; border-radius: 12px; border: 1px solid var(--color-sand); overflow: hidden; display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" style="height: 200px; overflow: hidden;">
                            <?php the_post_thumbnail('medium_large', ['style' => 'width: 100%; height: 100%; object-fit: cover;']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content" style="padding: 1.5rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <p class="post-date" style="font-size: 0.85rem; color: var(--color-text-light); margin-bottom: 0.5rem;"><?php echo get_the_date(); ?></p>
                        <h2 style="font-size: 1.5rem; margin-bottom: 1rem; line-height: 1.3;">
                            <a href="<?php the_permalink(); ?>" style="color: var(--color-charcoal); text-decoration: none;"><?php the_title(); ?></a>
                        </h2>
                        <div class="post-excerpt" style="margin-bottom: 1.5rem; color: var(--color-text-light); line-height: 1.6;">
                            <?php the_excerpt(); ?>
                        </div>
                        <div style="margin-top: auto;">
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary btn-small">Read More</a>
                        </div>
                    </div>
                </article>
            <?php endwhile; else : ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 0;">
                    <i class="fas fa-feather" style="font-size: 3rem; color: var(--color-sand); margin-bottom: 1rem;"></i>
                    <p>No stories have been shared yet. Check back soon!</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="pagination" style="margin-top: 4rem; text-align: center;">
            <?php 
            the_posts_pagination([
                'mid_size'  => 2,
                'prev_text' => '<i class="fas fa-arrow-left"></i> Newer',
                'next_text' => 'Older <i class="fas fa-arrow-right"></i>',
            ]); 
            ?>
        </div>
    </div>
</section>
</main>

<?php get_footer(); ?>
