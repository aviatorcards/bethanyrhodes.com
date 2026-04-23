<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="<?php echo bethany_img('favicon.ico'); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo bethany_img('favicon-192.png'); ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="<?php echo bethany_img('favicon-512.png'); ?>">
    <link rel="apple-touch-icon" href="<?php echo bethany_img('apple-touch-icon.png'); ?>">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="container">
        <a href="<?php echo home_url('/'); ?>" class="logo">
            <div class="logo-wrapper">
                <img src="<?php echo bethany_img('bethany-rhodes-icon.png'); ?>" alt="Bethany Rhodes Logo">
                <span class="logo-text"></span>
            </div>
        </a>
        <nav>
            <button class="hamburger" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </button>
            <ul>
                <li><a href="<?php echo home_url('/'); ?>" class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>">Home</a></li>
                <li><a href="<?php echo home_url('/about/'); ?>" class="nav-link <?php echo is_page('about') ? 'active' : ''; ?>">About</a></li>
                <li><a href="<?php echo home_url('/music/'); ?>" class="nav-link <?php echo is_page('music') ? 'active' : ''; ?>">Music</a></li>
                <li><a href="<?php echo home_url('/projects/'); ?>" class="nav-link <?php echo is_page('projects') ? 'active' : ''; ?>">Projects</a></li>
                <li><a href="<?php echo home_url('/videos/'); ?>" class="nav-link <?php echo is_page('videos') ? 'active' : ''; ?>">Videos</a></li>
                <li><a href="<?php echo home_url('/events/'); ?>" class="nav-link <?php echo is_page('events') ? 'active' : ''; ?>">Events</a></li>
                <li><a href="<?php echo home_url('/lessons/'); ?>" class="nav-link <?php echo is_page('lessons') ? 'active' : ''; ?>">Lessons</a></li>
                <li><a href="<?php echo home_url('/blog/'); ?>" class="nav-link <?php echo (is_home() || is_singular('post')) ? 'active' : ''; ?>">Blog</a></li>
                <li><a href="<?php echo home_url('/contact/'); ?>" class="nav-link <?php echo is_page('contact') ? 'active' : ''; ?>">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
