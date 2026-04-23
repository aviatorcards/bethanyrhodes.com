<?php
/**
 * Videos Page Template
 * Usage: Create a page with slug "videos"
 */
get_header();
?>

<main>

<section class="page-header">
    <div class="container">
        <h1>Bethany Rhodes</h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <h2>Performance Videos</h2>
            <p>Get a feel for the sound and energy Bethany brings to live spaces.</p>
        </div>

        <div class="video-grid">
            <div class="video-item">
                <div class="video-wrapper">
                    <iframe
                        src="https://www.youtube.com/embed/BU6ImUdwMCc"
                        title="So It Goes"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <h3>So It Goes</h3>
                <p class="video-description">So It Goes - Taylor Swift cover</p>
            </div>

            <div class="video-item">
                <div class="video-wrapper is-vertical">
                    <video controls>
                        <source src="/wp-content/uploads/2026/04/VID_20260419_155605.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <h3>Clips from Syd's Bar & Grill</h3>
                <p class="video-description">4/18/2026</p>
            </div>
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <h2>See More on YouTube</h2>
        <p>Subscribe for new performance videos and updates</p>
        <a href="https://www.youtube.com/@Bethany.D.Rhodes" class="btn btn-primary" target="_blank" rel="noopener">
            <i class="fab fa-youtube"></i> Visit YouTube Channel
        </a>
    </div>
</section>

</main>

<?php get_footer(); ?>
