<?php
/**
 * Contact Page Template
 * Usage: Create a page with slug "contact"
 */
get_header();
?>

<main>

<section class="page-header">
    <div class="container">
        <h1>Get in Touch</h1>
        <p class="page-subtitle">Book Bethany for your event or start vocal lessons</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="contact-layout">
            <div class="contact-info">
                <h2>Let's Connect</h2>
                <p>Whether you're planning a wedding, hosting a dinner, curating a market space, or interested in vocal coaching, Bethany works with you to create the perfect fit.</p>
                <p>Share a few details about your event - date, location, timing, and the vibe you're going for. If you're early in planning, that's okay too!</p>

                <div class="contact-methods">
                    <h3>Reach Out Directly</h3>
                    <div class="contact-method">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            <a href="mailto:booking@bethanyrhodes.com">booking@bethanyrhodes.com</a>
                        </div>
                    </div>

                    <h3>Social Media</h3>
                    <div class="social-contact">
                        <a href="https://www.instagram.com/willowmaker33" target="_blank" rel="noopener" class="social-btn">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="https://www.facebook.com/bethany.rhodes.914978" target="_blank" rel="noopener" class="social-btn">
                            <i class="fab fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form-container">
                <h2>Send a Message</h2>
                <form id="contact-form" class="contact-form">
                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone (optional)</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="inquiry-type">Inquiry Type *</label>
                        <select id="inquiry-type" name="inquiry_type" required>
                            <option value="">Select one...</option>
                            <option value="wedding">Wedding/Ceremony</option>
                            <option value="event">Event/Restaurant Booking</option>
                            <option value="lessons">Vocal Lessons</option>
                            <option value="other">General Inquiry</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="event-date">Event Date (if applicable)</label>
                        <input type="date" id="event-date" name="event_date">
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="6" required placeholder="Tell me about your event, preferred songs, or what you're looking for..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <span class="btn-text">Send Message</span>
                        <span class="btn-loading" style="display: none;">
                            <i class="fas fa-circle-notch fa-spin"></i> Sending...
                        </span>
                    </button>

                    <div id="form-message" class="form-message" style="display: none;"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="service-areas">
            <h2>Service Area</h2>
            <p>Based in Central Indiana, serving:</p>
            <ul class="area-list">
                <li>Indianapolis &amp; surrounding areas</li>
                <li>Noblesville, Fishers, Carmel</li>
                <li>Westfield, Zionsville</li>
                <li>And other Central Indiana communities</li>
            </ul>
            <p class="area-note">Travel outside this area may be available - just ask!</p>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
