<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="viajes a peru, tours espirituales peru, machu picchu tour, cusco viaje, valle sagrado, lago titicaca, selva amazonica peru, ceremonia andina, turismo espiritual, pachamama travel">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo esc_url(home_url('/')); ?>">
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>">
    <meta property="og:description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <meta property="og:locale" content="es_ES">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "TravelAgency",
        "name": "<?php bloginfo('name'); ?>",
        "description": "<?php echo esc_js(get_bloginfo('description')); ?>",
        "url": "<?php echo esc_url(home_url('/')); ?>",
        "telephone": "<?php echo esc_js(pm('whatsapp', '+51984123456')); ?>",
        "email": "<?php echo esc_js(pm('email', 'info@pachamamatravel.com')); ?>",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo esc_js(pm('oficina', 'Cusco, Peru')); ?>",
            "addressCountry": "PE"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "<?php echo esc_js(pm('stat_valoracion', '4.9')); ?>",
            "reviewCount": "<?php echo esc_js(str_replace(array(',', '+'), '', pm('stat_viajeros', '2500'))); ?>"
        }
    }
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- NAV -->
<nav class="nav" id="nav">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo"><?php bloginfo('name'); ?></a>
    <ul class="nav-links" id="navLinks">
        <li><a href="#destinos">Destinos</a></li>
        <li><a href="#paquetes">Paquetes</a></li>
        <li><a href="#testimonios">Testimonios</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="#contacto" class="nav-cta">Reservar</a></li>
    </ul>
    <button class="menu-toggle" id="menuToggle" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
</nav>
