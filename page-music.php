<?php
/**
 * Music Page Template
 * Usage: Create a page with slug "music"
 */
get_header();
?>

<main>

<section class="page-header">
    <div class="container">
        <h1>Listen to Bethany</h1>
        <p class="page-subtitle">Recordings, releases, and where to stream</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="media-layout">
            <div class="media-section">
                <h2>Featured Tracks</h2>
                <div class="audio-embed">
                    <div class="coming-soon-box">
                        <i class="fas fa-music"></i>
                        <p><strong>Audio selections coming soon</strong></p>
                        <p>Check back here for embedded players and streaming links.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section releases-section">
    <div class="container">
        <div class="section-heading">
            <h2>Releases</h2>
            <p>Singles, EPs, and recordings</p>
        </div>
        <div class="releases-grid">
            <div class="coming-soon-box">
                <i class="fas fa-compact-disc"></i>
                <p>New releases coming soon! Follow Bethany on social media to stay updated.</p>
            </div>
        </div>
    </div>
</section>

<section class="section repertoire-section">
    <div class="container">
        <div class="section-heading">
            <h2>Repertoire Highlights</h2>
            <p>A taste of what Bethany performs live</p>
        </div>
        <div class="repertoire-grid">
            <div class="repertoire-category">
                <h3>Classic Rock</h3>
                <ul>
                    <li>Fleetwood Mac</li>
                    <li>The Eagles</li>
                    <li>Tom Petty</li>
                    <li>Elton John</li>
                    <li>&amp; more</li>
                </ul>
            </div>
            <div class="repertoire-category">
                <h3>Pop &amp; Contemporary</h3>
                <ul>
                    <li>Adele</li>
                    <li>Sara Bareilles</li>
                    <li>Norah Jones</li>
                    <li>Taylor Swift</li>
                    <li>&amp; more</li>
                </ul>
            </div>
            <div class="repertoire-category">
                <h3>Country &amp; Americana</h3>
                <ul>
                    <li>Patsy Cline</li>
                    <li>Dolly Parton</li>
                    <li>Kacey Musgraves</li>
                    <li>The Chicks</li>
                    <li>&amp; more</li>
                </ul>
            </div>
        </div>
        <div class="repertoire-note">
            <p><strong>Need a specific song?</strong> Bethany is always expanding her setlist and can learn songs for special requests. <a href="<?php echo home_url('/contact/'); ?>">Get in touch</a> to discuss your event's music needs.</p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
