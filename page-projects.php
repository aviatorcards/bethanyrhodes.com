<?php
/**
 * Projects Page Template
 * Usage: Create a page with slug "projects"
 *
 * Projects are managed via the "Projects" post type in the WP admin.
 * Upcoming vs. past is determined automatically by event date.
 */

get_header();

?>

<main>

<section class="page-header">
    <div class="container">
        <h1>Projects I'm involved in</h1>
        <p class="page-subtitle">Look who I've been making music with!!</p>
    </div>
</section>

<section class="section">
    <div class="container">

<?php
        $projects = get_posts( [
            'post_type'      => 'br_project',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ] );

        if ( ! empty( $projects ) ) : ?>
            <div class="projects-grid">
                <?php foreach ( $projects as $project ) :
                    $subtitle = get_post_meta( $project->ID, '_project_subtitle', true );
                    $url      = get_post_meta( $project->ID, '_project_url',      true );
                    $excerpt  = has_excerpt( $project->ID ) ? get_the_excerpt( $project->ID ) : wp_trim_words( $project->post_content, 25 );
                ?>
                    <article class="project-card">
                        <div class="project-content">
                            <?php if ( $subtitle ) : ?>
                                <span class="project-subtitle"><?php echo esc_html( $subtitle ); ?></span>
                            <?php endif; ?>
                            
                            <h3><?php echo esc_html( $project->post_title ); ?></h3>
                            
                            <div class="project-description">
                                <p><?php echo esc_html( $excerpt ); ?></p>
                            </div>

                            <?php if ( $url ) : ?>
                                <div class="project-footer">
                                    <a href="<?php echo esc_url( $url ); ?>" class="text-link" target="_blank" rel="noopener noreferrer">
                                        View Project <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="no-projects text-center">
                <i class="fas fa-music mb-md" style="font-size: 3rem; color: var(--color-sand);"></i>
                <h2>More Projects Coming Soon</h2>
                <p>Bethany is always working on new collaborations and musical ventures. Check back soon for updates!</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <h2>Want Bethany at Your Event?</h2>
        <p>Available for weddings, private parties, restaurants, and community events</p>
        <a href="<?php echo home_url( '/contact/' ); ?>" class="btn btn-primary">Book Now</a>
    </div>
</section>

</main>

<?php get_footer(); ?>
