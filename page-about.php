<?php
/**
 * About Page Template
 * Usage: Create a page with slug "about"
 */
get_header();
?>

<main>

<section class="page-header">
    <div class="container">
        <h1>About Bethany</h1>
        <p class="page-subtitle">A versatile vocalist &amp; pianist for every occasion</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-hero-image">
            <img src="<?php echo bethany_img('hero.jpg'); ?>" alt="Bethany Rhodes at the piano">
        </div>

        <div class="about-layout">
            <div class="about-text">
                <h2>Making every performance personal</h2>
                <p>Bethany is a versatile vocalist and pianist with a dynamic repertoire of over 100 songs. Effortlessly shifting between classic rock, pop, and country from across the decades, she tailors every performance to fit the unique style of your event.</p>

                <p>From intimate gatherings and farmer's markets to weddings and large celebrations, Bethany creates an atmosphere that feels live, personal, and memorable—never canned or background.</p>

                <p>Based in Central Indiana, Bethany brings warmth and authenticity to every venue. Her performances invite guests to lean in, relax, and stay a little longer.</p>

                <h3>What Bethany Offers</h3>
                <ul class="about-list">
                    <li><strong>Weddings &amp; ceremonies</strong> - Processionals, cocktail hours, and first dances</li>
                    <li><strong>Restaurants &amp; markets</strong> - Community events and regular gigs</li>
                    <li><strong>Private parties</strong> - Corporate gatherings and celebrations</li>
                    <li><strong>Vocal coaching</strong> - One-on-one personalized instruction</li>
                </ul>
            </div>

            <aside class="details-card">
                <h3>At a Glance</h3>
                <ul class="details-list">
                    <li>
                        <span class="detail-label">Based in:</span>
                        <span class="detail-value">Central Indiana</span>
                    </li>
                    <li>
                        <span class="detail-label">Repertoire:</span>
                        <span class="detail-value">100+ songs</span>
                    </li>
                    <li>
                        <span class="detail-label">Genres:</span>
                        <span class="detail-value">Rock, Pop, Country</span>
                    </li>
                    <li>
                        <span class="detail-label">Sets:</span>
                        <span class="detail-value">Flexible length</span>
                    </li>
                </ul>
                <div class="detail-section">
                    <h4>Influences</h4>
                    <p>Drawing from classic and contemporary artists, Bethany's style blends the storytelling of Carole King, the soul of Norah Jones, and the energy of Sara Bareilles.</p>
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="section testimonials-section">
    <div class="container">
        <div class="section-heading">
            <h2>What People Are Saying</h2>
            <p>A few words from people who've invited Bethany into their spaces.</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <p>"Bethany made our ceremony unforgettable. The music felt so personal and exactly like us."</p>
                <p class="testimonial-meta">Emily &amp; Ryan — Wedding ceremony</p>
            </div>
            <div class="testimonial-card">
                <p>"Guests kept asking where we found her. She set the perfect tone for the whole evening."</p>
                <p class="testimonial-meta">Tina - Restaurant manager</p>
            </div>
            <div class="testimonial-card">
                <p>"As a coach, she's encouraging and honest in the best way. I hear the difference every week."</p>
                <p class="testimonial-meta">Jill - Vocal student</p>
            </div>
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <h2>Let's Work Together</h2>
        <p>Ready to discuss your event or start vocal coaching?</p>
        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary">Get in Touch</a>
    </div>
</section>

</main>

<?php get_footer(); ?>
