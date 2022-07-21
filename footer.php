<footer>
        <div class="contact-info">
            <div class="contact-info-email contact-info-type">
                <a href="mailto:info@devolendammer.nl">info@devolendammer.nl</a>
            </div>
            <div class="contact-info-phone contact-info-type">
                <a href="tel:+0255511620">+(0255) 511 620</a>
            </div>
        </div>
        <div class="information-blocks">
            <div class="information-block information-block-1">
                <div class="information-block-title">
                    Menu
                </div>
                <div class="information-block-content">
                    <?php 
                        wp_nav_menu(
                            array(
                                'theme-location' => 'footer-menu'
                            )
                        )
                    ?>
                </div>
            </div>
            <div class="information-block information-block-2">
                <div class="information-block-title">
                    Openingstijden
                </div>
                <div class="information-block-content">
                    <ul>
                        <li>
                            Ma t/m Vr: 8-18
                        </li>
                        <li>
                            Zaterdag: 8-16:30
                        </li>
                        <li>
                            Zondag: Gesloten
                        </li>
                    </ul>
                </div>
            </div>
            <div class="information-block information-block-3">
                <div class="information-block-title">
                    Adres
                </div>
                <div class="information-block-content">
                    <ul>
                        <li>
                        Cepheusstraat 29 </br>
                        1973 VR, IJmuiden
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            &copy; <?php echo date('Y') ?> De Vishandel Molenaar
            <?php if (is_shop()) {
                echo 'hey'; }?>
        </div>
    </footer>
        
    <style>          
    </style>
<?php wp_footer(); ?>

</body>
</html>
