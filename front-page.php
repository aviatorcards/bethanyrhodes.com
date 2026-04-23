<?php
/**
 * Front Page (Home) Template
 */
get_header();
?>

<main>

<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <p class="eyebrow">Vocalist &bull; Pianist &bull; Singer/Songwriter</p>
                <h1>Bethany Rhodes</h1>
                <p class="hero-subtitle">Upbeat music for events, ceremonies, and evenings out in Central Indiana.</p>
                <div class="hero-ctas">
                    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary">Book Bethany</a>
                    <a href="<?php echo home_url('/music/'); ?>" class="btn btn-secondary">Listen &amp; Watch</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-card">
                    <div class="hero-face hero-front">
                        <div class="hero-image-inner">
                            <img src="<?php echo bethany_img('bethany.png'); ?>" alt="Bethany Rhodes performing at the piano">
                            <div class="hero-tag">Available for events in Central Indiana</div>
                            <div class="click-hint"><i class="fas fa-play"></i></div>
                        </div>
                    </div>
                    <div class="hero-face hero-back">
                        <button class="flip-close-btn" aria-label="Close video">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="hero-image-inner" style="height: 100%;">
                            <iframe id="hero-video-iframe"
                                src="https://www.youtube.com/embed/RleVMzVMBpE?rel=0&enablejsapi=1"
                                title="Bethany Rhodes performing"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section services-section">
    <div class="container">
        <div class="section-heading">
            <h2>What Bethany Does</h2>
            <p>Versatile live music shaped around your space, your guests, and your moment.</p>
        </div>
        <div class="pillars">
            <div class="pillar-card">
                <div class="pillar-icon"><i class="fas fa-music"></i></div>
                <h3>Live Performance</h3>
                <p>Soulful piano and vocals for restaurants, markets, and special events with a relaxed, welcoming feel.</p>
            </div>
            <div class="pillar-card">
                <div class="pillar-icon"><i class="fas fa-heart"></i></div>
                <h3>Full bands</h3>
                <p>Bethany performs with an array of local bands to express her love for live music.</p>
            </div>
            <div class="pillar-card">
                <div class="pillar-icon"><i class="fas fa-microphone"></i></div>
                <h3>Vocal Coaching</h3>
                <p>Personalized coaching that builds confident, expressive singers at any stage of their journey.</p>
            </div>
        </div>
    </div>
</section>

<section class="section quick-previews">
    <div class="container">
        <div class="preview-grid">
            <div class="preview-card">
                <h3>Latest Performance</h3>
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/RleVMzVMBpE"
                        title="Bethany Rhodes performing"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <a href="<?php echo home_url('/videos/'); ?>" class="text-link">Watch more videos &rarr;</a>
            </div>

            <div class="preview-card">
                <h3>Upcoming Shows</h3>
                <?php
                $today          = date( 'Y-m-d' );
                $upcoming_shows = get_posts( [
                    'post_type'      => 'br_event',
                    'post_status'    => 'publish',
                    'posts_per_page' => 3,
                    'meta_key'       => '_event_date',
                    'orderby'        => 'meta_value',
                    'order'          => 'ASC',
                    'meta_query'     => [
                        [
                            'key'     => '_event_date',
                            'value'   => $today,
                            'compare' => '>=',
                            'type'    => 'DATE',
                        ],
                    ],
                ] );

                if ( ! empty( $upcoming_shows ) ) : ?>
                    <ul class="upcoming-shows-list">
                        <?php foreach ( $upcoming_shows as $show ) :
                            $raw_date = get_post_meta( $show->ID, '_event_date',     true );
                            $raw_time = get_post_meta( $show->ID, '_event_time',     true );
                            $location = get_post_meta( $show->ID, '_event_location', true );
                            $ts       = strtotime( $raw_date );
                        ?>
                            <li class="upcoming-show-item">
                                <div class="upcoming-show-date">
                                    <span class="upcoming-show-month"><?php echo date( 'M', $ts ); ?></span>
                                    <span class="upcoming-show-day"><?php echo date( 'j', $ts ); ?></span>
                                </div>
                                <div class="upcoming-show-info">
                                    <strong><?php echo esc_html( $show->post_title ); ?></strong>
                                    <?php if ( $location ) : ?>
                                        <span class="upcoming-show-location"><?php echo esc_html( $location ); ?></span>
                                    <?php endif; ?>
                                    <?php if ( $raw_time ) : ?>
                                        <span class="upcoming-show-time"><?php echo esc_html( date( 'g:i A', strtotime( $raw_time ) ) ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>New shows coming soon! Check back for updates.</p>
                <?php endif; ?>
                <a href="<?php echo home_url('/events/'); ?>" class="text-link">See all shows &rarr;</a>
            </div>
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <h2>Ready to bring live music to your event?</h2>
        <p>Whether it's a wedding, restaurant gig, or private party, Bethany creates the perfect atmosphere.</p>
        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary">Get in Touch</a>
    </div>
</section>

</main>

<?php get_footer(); ?>
