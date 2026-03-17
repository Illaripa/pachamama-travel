<!-- TESTIMONIALS -->
<section class="testimonials" id="testimonios">
    <div class="container text-center reveal">
        <span class="section-tag">
            <span class="icon"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></span>
            Testimonios
        </span>
        <h2 class="section-title">Lo que dicen nuestros viajeros</h2>
        <p class="section-subtitle">Historias reales de personas que vivieron la experiencia.</p>
    </div>
    <div class="container">
        <div class="testimonial-grid">
            <?php
            $star_svg = '<span class="icon"><svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></span>';

            $testimonios = new WP_Query(array(
                'post_type' => 'testimonio',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
            ));
            $delay = 1;
            if ($testimonios->have_posts()) :
                while ($testimonios->have_posts()) : $testimonios->the_post();
                    $ubicacion = get_post_meta(get_the_ID(), '_testimonio_ubicacion', true);
                    $estrellas = (int) get_post_meta(get_the_ID(), '_testimonio_estrellas', true) ?: 5;
                    $avatar = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            ?>
            <div class="testimonial-card reveal reveal-delay-<?php echo min($delay++, 3); ?>">
                <div class="testimonial-stars">
                    <?php echo str_repeat($star_svg, $estrellas); ?>
                </div>
                <blockquote>"<?php echo esc_html(wp_strip_all_tags(get_the_content())); ?>"</blockquote>
                <div class="testimonial-author">
                    <?php if ($avatar): ?>
                        <img src="<?php echo esc_url($avatar); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="testimonial-avatar" width="48" height="48" loading="lazy">
                    <?php endif; ?>
                    <div>
                        <div class="testimonial-name"><?php the_title(); ?></div>
                        <?php if ($ubicacion): ?>
                            <div class="testimonial-location"><?php echo esc_html($ubicacion); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
            ?>
            <p class="section-subtitle" style="text-align:center;grid-column:1/-1;">Agrega testimonios desde el admin de WordPress.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
