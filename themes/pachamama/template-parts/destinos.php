<!-- DESTINOS -->
<section class="destinations" id="destinos">
    <div class="container text-center reveal">
        <span class="section-tag">
            <span class="icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg></span>
            Destinos
        </span>
        <h2 class="section-title">Lugares que te cambiaran para siempre</h2>
        <p class="section-subtitle">Cada destino ha sido elegido por su poder energetico, belleza natural y riqueza cultural.</p>
    </div>
    <div class="container">
        <div class="dest-grid">
            <?php
            $destinos = new WP_Query(array(
                'post_type' => 'destino',
                'posts_per_page' => 4,
                'orderby' => 'meta_value_num',
                'meta_key' => '_destino_orden',
                'order' => 'ASC',
            ));
            $delay = 1;
            if ($destinos->have_posts()) :
                while ($destinos->have_posts()) : $destinos->the_post();
                    $tag = get_post_meta(get_the_ID(), '_destino_tag', true);
                    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
            ?>
            <div class="dest-card reveal reveal-delay-<?php echo min($delay++, 3); ?>">
                <?php if ($img): ?>
                    <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" width="600" height="900">
                <?php endif; ?>
                <div class="dest-overlay">
                    <?php if ($tag): ?><span class="dest-tag"><?php echo esc_html($tag); ?></span><?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words(get_the_content(), 12); ?></p>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                // Fallback hardcoded if no destinos in DB yet
            ?>
            <div class="dest-card reveal reveal-delay-1">
                <img src="https://images.unsplash.com/photo-1587595431973-160d0d94add1?w=600&q=80" alt="Machu Picchu, ciudadela inca en los Andes de Peru" loading="lazy" width="600" height="900">
                <div class="dest-overlay">
                    <span class="dest-tag">Maravilla del mundo</span>
                    <h3>Machu Picchu</h3>
                    <p>La ciudadela inca en las nubes. Energia pura a 2,430 metros.</p>
                </div>
            </div>
            <div class="dest-card reveal reveal-delay-2">
                <img src="https://images.pexels.com/photos/12457802/pexels-photo-12457802.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Ruinas incas de Sacsayhuaman, Cusco, Peru" loading="lazy" width="600" height="900">
                <div class="dest-overlay">
                    <span class="dest-tag">Centro energetico</span>
                    <h3>Valle Sagrado</h3>
                    <p>Mercados ancestrales, ruinas ocultas y ceremonias con curanderos.</p>
                </div>
            </div>
            <div class="dest-card reveal reveal-delay-3">
                <img src="https://images.pexels.com/photos/30804472/pexels-photo-30804472.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Lago Titicaca, Peru" loading="lazy" width="600" height="900">
                <div class="dest-overlay">
                    <span class="dest-tag">Cuna de civilizaciones</span>
                    <h3>Lago Titicaca</h3>
                    <p>El lago navegable mas alto del mundo. Islas flotantes y cultura viva.</p>
                </div>
            </div>
            <div class="dest-card reveal">
                <img src="https://images.pexels.com/photos/30302547/pexels-photo-30302547.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Vista aerea del rio Amazonas, selva peruana" loading="lazy" width="600" height="900">
                <div class="dest-overlay">
                    <span class="dest-tag">Medicina ancestral</span>
                    <h3>Selva Amazonica</h3>
                    <p>Inmersion total. Plantas medicinales y biodiversidad infinita.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
