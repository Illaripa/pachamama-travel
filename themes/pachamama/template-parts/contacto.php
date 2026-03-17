<!-- CONTACT -->
<section class="contact" id="contacto">
    <div class="container">
        <div class="contact-wrapper">
            <div class="reveal">
                <span class="section-tag">
                    <span class="icon"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                    Contacto
                </span>
                <h2 class="section-title">Hablemos de tu viaje</h2>
                <div class="contact-info">
                    <p>Cuentanos que tipo de experiencia buscas y te ayudamos a crear el viaje perfecto. Respuesta en menos de 24 horas.</p>
                    <div class="contact-detail">
                        <div class="contact-detail-icon icon">
                            <svg viewBox="0 0 24 24" style="width:1.2rem;height:1.2rem"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div class="contact-detail-text">
                            <span>Email</span>
                            <strong><?php echo esc_html(pm('email', 'info@pachamamatravel.com')); ?></strong>
                        </div>
                    </div>
                    <div class="contact-detail">
                        <div class="contact-detail-icon icon">
                            <svg viewBox="0 0 24 24" style="width:1.2rem;height:1.2rem"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
                        </div>
                        <div class="contact-detail-text">
                            <span>WhatsApp</span>
                            <strong><?php echo esc_html(pm('whatsapp', '+51 984 123 456')); ?></strong>
                        </div>
                    </div>
                    <div class="contact-detail">
                        <div class="contact-detail-icon icon">
                            <svg viewBox="0 0 24 24" style="width:1.2rem;height:1.2rem"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div class="contact-detail-text">
                            <span>Oficina</span>
                            <strong><?php echo esc_html(pm('oficina', 'Cusco, Peru')); ?></strong>
                        </div>
                    </div>
                </div>
            </div>
            <form class="contact-form reveal" onsubmit="handleSubmit(event)">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" id="name" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="tu@email.com" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Telefono / WhatsApp</label>
                        <input type="tel" id="phone" placeholder="+34 600 000 000">
                    </div>
                    <div class="form-group">
                        <label for="package">Paquete de interes</label>
                        <select id="package">
                            <option value="">Seleccionar...</option>
                            <?php
                            $paq = new WP_Query(array('post_type' => 'paquete', 'posts_per_page' => -1, 'orderby' => 'meta_value_num', 'meta_key' => '_paquete_orden', 'order' => 'ASC'));
                            if ($paq->have_posts()):
                                while ($paq->have_posts()): $paq->the_post();
                                    $dur = get_post_meta(get_the_ID(), '_paquete_duracion', true);
                            ?>
                            <option value="<?php echo esc_attr(sanitize_title(get_the_title())); ?>"><?php the_title(); ?><?php echo $dur ? ' (' . esc_html($dur) . ')' : ''; ?></option>
                            <?php endwhile; wp_reset_postdata(); else: ?>
                            <option value="esencial">Cusco Esencial (5 dias)</option>
                            <option value="sagrada">Ruta Sagrada (10 dias)</option>
                            <option value="amazonia">Amazonia + Andes (14 dias)</option>
                            <?php endif; ?>
                            <option value="personalizado">Viaje personalizado</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dates">Fechas aproximadas</label>
                    <input type="text" id="dates" placeholder="Ej: Junio 2026, fechas flexibles...">
                </div>
                <div class="form-group">
                    <label for="message">Tu viaje ideal</label>
                    <textarea id="message" placeholder="Que experiencias te interesan? Vienes solo/a o en grupo?"></textarea>
                </div>
                <button type="submit" class="btn-submit">
                    Solicitar Informacion
                    <span class="icon"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </button>
            </form>
        </div>
    </div>
</section>
