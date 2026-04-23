<?php
/**
 * Events Page Template
 * Usage: Create a page with slug "events"
 *
 * Events are managed via the "Events" post type in the WP admin.
 * Upcoming vs. past is determined automatically by event date.
 */

get_header();

// Fetch all published events ordered by date
$all_events = get_posts( [
    'post_type'      => 'br_event',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'meta_key'       => '_event_date',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
] );

$today    = date( 'Y-m-d' );
$upcoming = [];
$past     = [];

foreach ( $all_events as $event ) {
    $event_date = get_post_meta( $event->ID, '_event_date', true );
    if ( $event_date >= $today ) {
        $upcoming[] = $event;
    } else {
        $past[] = $event;
    }
}

// Past events should show most recent first
$past = array_reverse( $past );
?>

<main>

<section class="page-header">
    <div class="container">
        <h1>Upcoming Shows &amp; Events</h1>
        <p class="page-subtitle">Catch Bethany live in Central Indiana</p>
    </div>
</section>

<section class="section">
    <div class="container">

        <?php if ( empty( $upcoming ) ) : ?>

            <div class="no-events">
                <i class="fas fa-calendar-alt"></i>
                <h2>No Upcoming Shows</h2>
                <p>New performances are being scheduled! Check back soon or follow Bethany on social media for announcements.</p>
                <a href="<?php echo home_url( '/contact/' ); ?>" class="btn btn-primary">Book Bethany for Your Event</a>
            </div>

        <?php else : ?>

            <div class="events-list">
                <?php foreach ( $upcoming as $event ) :
                    $raw_date = get_post_meta( $event->ID, '_event_date',     true );
                    $raw_time = get_post_meta( $event->ID, '_event_time',     true );
                    $location = get_post_meta( $event->ID, '_event_location', true );
                    $url      = get_post_meta( $event->ID, '_event_url',      true );
                    $notes    = get_post_meta( $event->ID, '_event_notes',    true );

                    $ts           = strtotime( $raw_date );
                    $display_time = $raw_time ? date( 'g:i A', strtotime( $raw_time ) ) : '';
                ?>
                    <div class="event-card">
                        <div class="event-date-badge">
                            <span class="event-month"><?php echo date( 'M', $ts ); ?></span>
                            <span class="event-day"><?php echo date( 'j', $ts ); ?></span>
                        </div>
                        <div class="event-details">
                            <h3><?php echo esc_html( $event->post_title ); ?></h3>
                            <?php if ( $location ) : ?>
                                <p class="event-location"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $location ); ?></p>
                            <?php endif; ?>
                            <?php if ( $display_time ) : ?>
                                <p class="event-meta"><i class="fas fa-clock"></i> <?php echo esc_html( $display_time ); ?></p>
                            <?php endif; ?>
                            <?php if ( $notes ) : ?>
                                <p class="event-meta"><i class="fas fa-info-circle"></i> <?php echo esc_html( $notes ); ?></p>
                            <?php endif; ?>
                            <?php if ( $url ) : ?>
                                <a href="<?php echo esc_url( $url ); ?>" class="btn btn-secondary btn-small event-link" target="_blank" rel="noopener noreferrer">More Info</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

        <?php if ( ! empty( $past ) ) : ?>
            <div class="past-events-section">
                <div class="section-heading">
                    <h2>Past Performances</h2>
                    <p>Recent shows and venues</p>
                </div>

                <div class="past-events-grid">
                    <?php foreach ( $past as $event ) :
                        $raw_date = get_post_meta( $event->ID, '_event_date',     true );
                        $location = get_post_meta( $event->ID, '_event_location', true );
                        $ts       = strtotime( $raw_date );
                    ?>
                        <div class="past-event-card">
                            <div class="past-event-date"><?php echo date( 'F j, Y', $ts ); ?></div>
                            <h4><?php echo esc_html( $event->post_title ); ?></h4>
                            <?php if ( $location ) : ?>
                                <p class="past-event-location"><?php echo esc_html( $location ); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
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
