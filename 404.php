<?php
/**
 * 404.php - Page not found template
 */
get_header();
?>

<main>
<section class="section">
    <div class="container" style="text-align:center; padding:6rem 2rem;">
        <div class="pillar-icon" style="font-size:4rem; margin-bottom:2rem;">
            <i class="fas fa-music" style="color:var(--color-primary-light);"></i>
        </div>
        <h1 style="font-size:6rem; color:var(--color-primary-light); margin-bottom:0; line-height:1;">404</h1>
        <h2 style="margin-top:1rem;">Page Not Found</h2>
        <p style="color:var(--color-text-light); font-size:1.125rem; margin-bottom:2rem;">Looks like this page has stepped off stage. Let's get you back to the music.</p>
        <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">Go Back Home</a>
    </div>
</section>
</main>

<?php get_footer(); ?>
