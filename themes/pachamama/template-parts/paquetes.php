<!-- PAQUETES -->
<section class="packages" id="paquetes">
    <div class="container text-center reveal">
        <span class="section-tag">
            <span class="icon"><svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg></span>
            Paquetes
        </span>
        <h2 class="section-title">Experiencias para cada viajero</h2>
        <p class="section-subtitle">Todos incluyen alojamiento, transporte, guia bilingue y comidas principales.</p>
    </div>
    <div class="container">
        <div class="package-grid">
            <?php
            $paquetes = new WP_Query(array(
                'post_type' => 'paquete',
                'posts_per_page' => -1,
                'orderby' => 'meta_value_num',
                'meta_key' => '_paquete_orden',
                'order' => 'ASC',
            ));
            $delay = 1;
            if ($paquetes->have_posts()) :
                while ($paquetes->have_posts()) : $paquetes->the_post();
                    $duracion = get_post_meta(get_the_ID(), '_paquete_duracion', true);
                    $precio = get_post_meta(get_the_ID(), '_paquete_precio', true);
                    $features = get_post_meta(get_the_ID(), '_paquete_features', true);
                    $destacado = get_post_meta(get_the_ID(), '_paquete_destacado', true);
                    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $features_arr = $features ? array_filter(explode("\n", $features)) : array();
            ?>
            <div class="package-card<?php echo $destacado === '1' ? ' featured' : ''; ?> reveal reveal-delay-<?php echo min($delay++, 3); ?>">
                <?php if ($destacado === '1'): ?><div class="package-popular">Mas popular</div><?php endif; ?>
                <?php if ($img): ?>
                <div class="package-img">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" width="700" height="240">
                </div>
                <?php endif; ?>
                <div class="package-body">
                    <?php if ($duracion): ?>
                    <span class="package-duration">
                        <span class="icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
                        <?php echo esc_html($duracion); ?>
                    </span>
                    <?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                    <?php if (!empty($features_arr)): ?>
                    <ul class="package-features">
                        <?php foreach ($features_arr as $feature): ?>
                        <li><span class="icon"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></span><?php echo esc_html(trim($feature)); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php if ($precio): ?>
                    <div class="package-footer">
                        <div class="package-price">
                            <span class="from">Desde</span>
                            <span class="amount">$<?php echo esc_html(number_format((int)$precio, 0, '', ',')); ?></span>
                            <span class="per">/ persona</span>
                        </div>
                        <a href="#contacto" class="btn-package">
                            Reservar
                            <span class="icon"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
            ?>
            <p class="section-subtitle" style="text-align:center;grid-column:1/-1;">Agrega paquetes desde el admin de WordPress.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
