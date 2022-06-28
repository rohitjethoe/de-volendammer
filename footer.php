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
        <?php
            if (is_front_page()) {
                $image = get_template_directory_uri() . '/images/background-image.png';
                $mobile_image = get_template_directory_uri() . '/images/mobile-background.png';

                echo "
                main { 
                    background: url('$image') no-repeat center center fixed; 
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                }
                
                @media only screen and (max-width: 775px) {
                    main {
                        background: url('$mobile_image') no repeat center center fixed;
                        background-position: calc(52.5%);
                   }
                }
                ";

            } elseif (is_shop()) {
                $image = get_template_directory_uri() . '/images/winkel.png';

                echo "
                main { 
                    background: url('$image') no-repeat center center fixed; 
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                }
                
                // #background-video {
                   // height: 100vh;
                   // width: 100vw;
                   // object-fit: cover;
                   // position: fixed;
                   // left: 0;
                   // right: 0;
                   // top: 0;
                   // bottom: 0;
                   // z-index: -1;
                // }";
            }
        ?>
    </style>
<?php wp_footer(); ?>

</body>
</html>
