<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo"><?php bloginfo('name'); ?></a>
                <p><?php echo esc_html(pm('footer_descripcion', 'Tours espirituales y culturales en Peru. Conectando viajeros con la sabiduria ancestral de los Andes desde 2014.')); ?></p>
                <div class="footer-social">
                    <?php if ($ig = pm('instagram', '#')): ?>
                    <a href="<?php echo esc_url($ig); ?>" aria-label="Instagram" target="_blank" rel="noopener">
                        <span class="icon"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></span>
                    </a>
                    <?php endif; ?>
                    <?php if ($fb = pm('facebook', '#')): ?>
                    <a href="<?php echo esc_url($fb); ?>" aria-label="Facebook" target="_blank" rel="noopener">
                        <span class="icon"><svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg></span>
                    </a>
                    <?php endif; ?>
                    <?php if ($yt = pm('youtube', '#')): ?>
                    <a href="<?php echo esc_url($yt); ?>" aria-label="YouTube" target="_blank" rel="noopener">
                        <span class="icon"><svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.25 29 29 0 00-.46-5.43z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg></span>
                    </a>
                    <?php endif; ?>
                    <?php if ($tt = pm('tiktok', '#')): ?>
                    <a href="<?php echo esc_url($tt); ?>" aria-label="TikTok" target="_blank" rel="noopener">
                        <span class="icon"><svg viewBox="0 0 24 24"><path d="M9 12a4 4 0 104 4V4a5 5 0 005 5"/></svg></span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <h4>Destinos</h4>
                <ul>
                    <li><a href="#">Cusco</a></li>
                    <li><a href="#">Machu Picchu</a></li>
                    <li><a href="#">Valle Sagrado</a></li>
                    <li><a href="#">Lago Titicaca</a></li>
                    <li><a href="#">Selva Amazonica</a></li>
                </ul>
            </div>
            <div>
                <h4>Paquetes</h4>
                <ul>
                    <li><a href="#">Cusco Esencial</a></li>
                    <li><a href="#">Ruta Sagrada</a></li>
                    <li><a href="#">Amazonia Profunda</a></li>
                    <li><a href="#">Viaje a medida</a></li>
                    <li><a href="#">Retiros grupales</a></li>
                </ul>
            </div>
            <div>
                <h4>Info</h4>
                <ul>
                    <li><a href="#">Sobre nosotros</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Guia de viaje</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Trabaja con nosotros</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.</p>
            <div class="footer-legal">
                <a href="#">Privacidad</a>
                <a href="#">Terminos</a>
                <a href="#">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
