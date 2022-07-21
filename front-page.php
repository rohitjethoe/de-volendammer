<?php get_header(); ?>
    <main id="primary" class="site-main">
        <div class="entry-header">
            <img class="entry-header-background" src="<?php echo get_template_directory_uri() . '/images/mobile-background.png' ?>" alt="">
            <div class="entry-header-title">
                <p>
                    De Vishandel Molenaar, <br>
                    te Ijmuiden.
                </p>
            </div>
            <div class="entry-header-button">
                <a href="<?php echo get_site_url() . '/assortiment' ?>">Bestellen</a>
            </div>
        </div>
        <div class="entry-content">
            <div class="entry-content-about">
                <div class="entry-content-about-slogan">
                De <span>meest verse</span> vis, van de laatste trek. <br>
                al jaren een begrip in Ijmuiden.
                </div>
                <div class="entry-content-about-reviews">
                    <div class="google-reviews">
                        <div class="google-reviews-block google-reviews-rating">
                            <h1>4.2</h1>
                        </div>
                        <div class="google-reviews-block google-reviews-stars">
                            
                            <?php 
                                for ($i = 0; $i < 4; $i++) {
                                    $google_star_directory = get_template_directory_uri() . '/images/star.png';

                                    echo "<img class='google-rating-star' src='$google_star_directory' alt='Google Ratings star' />";
                                }
                            ?>
                        </div>
                        <div class="google-reviews-block google-reviews-logo">
                            <?php 
                                $google_logo_directory = get_template_directory_uri() . '/images/google-logo.png';

                                echo "<img class='google-rating-logo' src='$google_logo_directory' alt='Google Logo' />"
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="entry-content-categories">
                <div class="entry-content-categories-header">
                    <div class="categories-header-top">
                        Onze online viswinkel.
                    </div>
                    <div class="categories-header-rectangle"></div>
                    <div class="categories-header-bottom">
                        Vers geleverd, in 30 minuten.
                    </div>
                </div>
                <div class="category-slider-button category-slider-button-left category-slider-mobile" onclick="sliderBtnLeft()">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
                <div class="category-slider-button category-slider-button-right category-slider-mobile" onclick="sliderBtnRight()">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="category-slider-button category-slider-button-left category-slider-mobile" onclick="sliderBtnLeft()">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
                <div class="category-slider-button category-slider-button-right category-slider-mobile" onclick="sliderBtnRight()">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="categories">   
                    <?php 
                        $taxonomy     = 'product_cat';
                        $orderby      = 'name';  
                        $show_count   = 0;      
                        $pad_counts   = 0;      
                        $hierarchical = 1;     
                        $title        = '';  
                        $empty        = 0;
                        
                        $args = array(
                                'taxonomy'     => $taxonomy,
                                'orderby'      => $orderby,
                                'show_count'   => $show_count,
                                'pad_counts'   => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li'     => $title,
                                'hide_empty'   => $empty
                        );
                        $all_categories = get_categories( $args );
                        foreach ($all_categories as $cat) {
                            if($cat->category_parent == 0) {
                                $category_id = $cat->term_id;  
                                $category_thumb_id =  get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                                $category_image = wp_get_attachment_image_src( $category_thumb_id, 'shop_catalog' );

                                if ($category_image == "") {
                                    $category_image[0] = get_site_url() . '/wp-content/uploads/woocommerce-placeholder-300x300.png';
                                }

                                if ($cat->count !== 0) {
                                    echo '
                                    <div class="category">
                                        <div class="category-image">
                                            <a href="' . get_term_link($cat->slug, 'product_cat') . '">
                                                <img src="' . $category_image[0] . '" alt="img" />
                                            </a>
                                        </div>
                                        <div class="category-link">
                                            <a href="' . get_term_link($cat->slug, 'product_cat') . '">
                                                <span>' . $cat->count . ' producten</span> 
                                                </br>' . $cat->name . ' 
                                            </a>
                                        </div>
                                    </div>
                                    ';
                                }
                            }       
                        }
                    ?>    
                </div>
                <div class="entry-content-categories-footer">
                    <div class="categories-footer">
                        <p>
                            De lekkerste vis vangt men nog altijd in de Noordzee. Dagelijks betrekt de Volendammer dan ook zijn verse vis direct aan de bron en bij voorkeur de vis van ‘de laatste trek’. Verser kan eigenlijk niet. In IJmuiden vindt u een van de modernste vis speciaalzaken van Nederland.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>