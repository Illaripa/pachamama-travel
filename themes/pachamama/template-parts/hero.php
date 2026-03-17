<!-- HERO -->
<section class="hero" aria-label="Portada principal">
    <div class="hero-bg"></div>
    <div class="hero-content">
        <div class="hero-badge">
            <span class="icon"><svg viewBox="0 0 24 24"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2z"/></svg></span>
            <?php echo esc_html(pm('hero_badge', 'Viajes que transforman')); ?>
        </div>
        <h1><?php echo wp_kses_post(pm('hero_titulo', 'Descubre la<br><em>magia ancestral</em><br>de Peru')); ?></h1>
        <p class="hero-sub"><?php echo esc_html(pm('hero_subtitulo', 'Tours espirituales y culturales que te conectan con la sabiduria milenaria de los Andes, la selva amazonica y las civilizaciones mas antiguas de America.')); ?></p>
        <div class="hero-buttons">
            <a href="#paquetes" class="btn-primary">
                Ver Paquetes
                <span class="icon"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
            </a>
            <a href="#destinos" class="btn-ghost">
                <span class="icon"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
                Explorar Destinos
            </a>
        </div>
        <div class="hero-stats">
            <div class="hero-stat">
                <div class="hero-stat-num"><?php echo esc_html(pm('stat_viajeros', '2,500+')); ?></div>
                <div class="hero-stat-label">Viajeros</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num"><?php echo esc_html(pm('stat_anos', '12')); ?></div>
                <div class="hero-stat-label">Anos</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num"><?php echo esc_html(pm('stat_valoracion', '4.9')); ?></div>
                <div class="hero-stat-label">Valoracion</div>
            </div>
            <div class="hero-stat">
                <div class="hero-stat-num"><?php echo esc_html(pm('stat_recomiendan', '98%')); ?></div>
                <div class="hero-stat-label">Recomiendan</div>
            </div>
        </div>
    </div>
</section>
