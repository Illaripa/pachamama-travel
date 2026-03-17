<!-- FAQ -->
<section class="faq" id="faq">
    <div class="container text-center reveal">
        <span class="section-tag">
            <span class="icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></span>
            Preguntas frecuentes
        </span>
        <h2 class="section-title">Todo lo que necesitas saber</h2>
    </div>
    <div class="container">
        <div class="faq-list">
            <?php
            $faqs = new WP_Query(array(
                'post_type' => 'faq',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ));
            if ($faqs->have_posts()) :
                while ($faqs->have_posts()) : $faqs->the_post();
            ?>
            <div class="faq-item reveal">
                <button class="faq-question">
                    <?php the_title(); ?>
                    <span class="faq-icon icon"><svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
                </button>
                <div class="faq-answer">
                    <p><?php echo esc_html(wp_strip_all_tags(get_the_content())); ?></p>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                // Fallback FAQs
                $default_faqs = array(
                    'Necesito estar en buena condicion fisica?' => 'No necesitas ser atleta, pero una condicion fisica basica ayuda. Cusco esta a 3,400m de altitud. Te damos recomendaciones previas y hojas de coca para la aclimatacion. Los trekkings son opcionales.',
                    'Que incluye el precio del paquete?' => 'Alojamiento (3-4 estrellas), transporte interno, guia bilingue, entradas a sitios arqueologicos, desayunos y almuerzos, ceremonias y seguro de viaje basico. No incluye vuelos internacionales, cenas ni gastos personales.',
                    'Puedo viajar solo/a?' => 'Absolutamente. El 40% de nuestros viajeros vienen solos. Los grupos pequenos (max. 12) hacen que las conexiones sean profundas. Muchos terminan siendo amigos de por vida.',
                    'Las ceremonias espirituales son seguras?' => 'Si. Trabajamos con curanderos de confianza con anos de experiencia. Las ceremonias son respetuosas y nunca obligatorias. Tu bienestar es nuestra prioridad absoluta.',
                    'Cual es la mejor epoca para viajar?' => 'La temporada seca (mayo-octubre) es ideal para trekking. La de lluvias (noviembre-abril) tiene menos turistas y precios mas bajos. Peru es hermoso todo el ano.',
                    'Cual es la politica de cancelacion?' => 'Cancelacion gratuita hasta 60 dias antes. Entre 30-60 dias se retiene el 30%. Menos de 30 dias, el 50%. En emergencias medicas evaluamos cada caso con flexibilidad.',
                );
                foreach ($default_faqs as $q => $a):
            ?>
            <div class="faq-item reveal">
                <button class="faq-question">
                    <?php echo esc_html($q); ?>
                    <span class="faq-icon icon"><svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
                </button>
                <div class="faq-answer">
                    <p><?php echo esc_html($a); ?></p>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
