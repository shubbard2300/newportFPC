<?php
/**
 * The front page template file
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title">Welcome to <?php bloginfo('name'); ?></h1>
                    </header>

                    <?php newport_fpc_post_thumbnail(); ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <!-- Default homepage content if no static page is set -->
            <div class="welcome-section">
                <h1>Welcome to Newport First Presbyterian Church</h1>
                <p class="lead">We are a community of faith dedicated to serving God and our neighbors with love, compassion, and grace.</p>
                
                <div class="service-times">
                    <h2>Join Us for Worship</h2>
                    <div class="service-info">
                        <div class="service">
                            <h3>Sunday Service</h3>
                            <p><?php echo get_theme_mod('newport_fpc_sunday_service', '10:00 AM'); ?></p>
                        </div>
                        <div class="service">
                            <h3>Wednesday Service</h3>
                            <p><?php echo get_theme_mod('newport_fpc_wednesday_service', '7:00 PM'); ?></p>
                        </div>
                    </div>
                </div>

                <?php if (get_theme_mod('newport_fpc_address')) : ?>
                <div class="church-info">
                    <h2>Visit Us</h2>
                    <address>
                        <?php echo nl2br(esc_html(get_theme_mod('newport_fpc_address'))); ?>
                    </address>
                    <?php if (get_theme_mod('newport_fpc_phone')) : ?>
                        <p><strong>Phone:</strong> <?php echo esc_html(get_theme_mod('newport_fpc_phone')); ?></p>
                    <?php endif; ?>
                    <?php if (get_theme_mod('newport_fpc_email')) : ?>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr(get_theme_mod('newport_fpc_email')); ?>"><?php echo esc_html(get_theme_mod('newport_fpc_email')); ?></a></p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <!-- Recent Sermons -->
                <?php
                $recent_sermons = new WP_Query(array(
                    'post_type' => 'sermons',
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));
                
                if ($recent_sermons->have_posts()) : ?>
                    <div class="recent-sermons">
                        <h2>Recent Sermons</h2>
                        <div class="sermons-grid">
                            <?php while ($recent_sermons->have_posts()) : $recent_sermons->the_post(); ?>
                                <article class="sermon-item">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="sermon-meta">
                                        <span class="sermon-date"><?php echo get_the_date(); ?></span>
                                    </div>
                                    <div class="sermon-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                        <p class="view-all-sermons">
                            <a href="<?php echo get_post_type_archive_link('sermons'); ?>" class="read-more">View All Sermons</a>
                        </p>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <!-- Upcoming Events -->
                <?php
                $upcoming_events = new WP_Query(array(
                    'post_type' => 'events',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'meta_key' => '_event_date',
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => '_event_date',
                            'value' => date('Y-m-d'),
                            'compare' => '>='
                        )
                    )
                ));
                
                if ($upcoming_events->have_posts()) : ?>
                    <div class="upcoming-events">
                        <h2>Upcoming Events</h2>
                        <div class="events-grid">
                            <?php while ($upcoming_events->have_posts()) : $upcoming_events->the_post(); ?>
                                <article class="event-item">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="event-meta">
                                        <?php 
                                        $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                                        $event_time = get_post_meta(get_the_ID(), '_event_time', true);
                                        $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                                        ?>
                                        <?php if ($event_date) : ?>
                                            <span class="event-date"><?php echo date('F j, Y', strtotime($event_date)); ?></span>
                                        <?php endif; ?>
                                        <?php if ($event_time) : ?>
                                            <span class="event-time"><?php echo esc_html($event_time); ?></span>
                                        <?php endif; ?>
                                        <?php if ($event_location) : ?>
                                            <span class="event-location"><?php echo esc_html($event_location); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="event-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                        <p class="view-all-events">
                            <a href="<?php echo get_post_type_archive_link('events'); ?>" class="read-more">View All Events</a>
                        </p>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
