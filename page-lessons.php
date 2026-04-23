<?php
/**
 * Lessons Page Template
 * Usage: Create a page with slug "lessons"
 */
get_header();
?>

<main>

<section class="page-header">
    <div class="container">
        <h1>Vocal Coaching</h1>
        <p class="page-subtitle">Personalized instruction for confident, expressive singing</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="lessons-intro">
            <div class="lessons-text">
                <h2>Build Your Voice with Confidence</h2>
                <p>Whether you're just starting out or looking to refine your technique, Bethany provides personalized vocal coaching tailored to your goals and skill level.</p>
                <p>With a focus on healthy technique, expression, and confidence-building, lessons cover breath support, pitch control, tone development, and performance skills. Students work on songs they love while building a strong technical foundation.</p>
            </div>
            <div class="lessons-image">
                <img src="<?php echo bethany_img('bethany.png'); ?>" alt="Piano and vocals - the foundation of Bethany's teaching">
            </div>
        </div>

        <div class="lessons-details">
            <div class="detail-box">
                <h3>What You'll Learn</h3>
                <ul class="checkmark-list">
                    <li>Proper breathing and breath support techniques</li>
                    <li>Vocal warm-ups and healthy singing habits</li>
                    <li>Pitch accuracy and ear training</li>
                    <li>Tone development and vocal quality</li>
                    <li>Performance confidence and stage presence</li>
                    <li>Song interpretation and expression</li>
                    <li>Genre-specific techniques (pop, rock, country, etc.)</li>
                </ul>
            </div>

            <div class="detail-box">
                <h3>Lesson Details</h3>
                <ul class="info-list">
                    <li><strong>Format:</strong> One-on-one private lessons</li>
                    <li><strong>Duration:</strong> 30-minute or 60-minute sessions</li>
                    <li><strong>Location:</strong> Central Indiana (in-person) or virtual options available</li>
                    <li><strong>Skill Level:</strong> All levels welcome - beginners to advanced</li>
                    <li><strong>Age Range:</strong> Teens and adults</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section pricing-section">
    <div class="container">
        <div class="section-heading">
            <h2>Rates &amp; Booking</h2>
            <p>Flexible scheduling and package options available</p>
        </div>

        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>30-Minute Session</h3>
                <div class="price">Contact for Rates</div>
                <p>Perfect for beginners or focused skill work</p>
            </div>

            <div class="pricing-card featured">
                <h3>60-Minute Session</h3>
                <div class="price">Contact for Rates</div>
                <p>Comprehensive lesson with technique &amp; repertoire</p>
                <span class="badge">Most Popular</span>
            </div>

            <div class="pricing-card">
                <h3>Package Discounts</h3>
                <div class="price">Available</div>
                <p>Save with multi-lesson packages</p>
            </div>
        </div>

        <div class="pricing-note">
            <p><strong>Ready to get started?</strong> <a href="<?php echo home_url('/contact/'); ?>">Contact Bethany</a> to discuss your goals and schedule a first lesson.</p>
        </div>
    </div>
</section>

<section class="section testimonials-section">
    <div class="container">
        <div class="section-heading">
            <h2>Student Testimonials</h2>
            <p>What students are saying about their progress</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <p>"Bethany helped me find my voice - literally! I never thought I could sing, but her patient approach and encouraging feedback have made all the difference."</p>
                <p class="testimonial-meta">Sarah, Adult Beginner</p>
            </div>
            <div class="testimonial-card">
                <p>"As a coach, she's encouraging and honest in the best way. I hear the difference every week, and I finally feel confident performing."</p>
                <p class="testimonial-meta">Marcus, Intermediate Student</p>
            </div>
            <div class="testimonial-card">
                <p>"Bethany tailored lessons to the songs I love, which kept me motivated. Her technical guidance improved my range and tone significantly."</p>
                <p class="testimonial-meta">Emma, Advanced Student</p>
            </div>
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <h2>Start Your Vocal Journey</h2>
        <p>Book a lesson and discover what your voice can do</p>
        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary">Get in Touch</a>
    </div>
</section>

</main>

<?php get_footer(); ?>
