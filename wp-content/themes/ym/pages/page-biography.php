<?php
/**
 * Yazz
 *
 * Yazz Theme.
 *
 * Template Name: Pagina biografia
 *
 * @package Yazz
 * @author  Yazz
 * @license GPL-2.0+
 * @link    http://www.yazz.com/
 */
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action('genesis_after_header', 'page_def_function');
function page_def_function() {
	?>
    <div class="wrap pt-5 pb-60">
    <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; 
        endif; ?>
    </div>
	<?php
    // Clases Viruales
    echo do_shortcode('[clases_virtuales]');
    // End Clases Viruales
    ?><section class="contact-book-bio">
        <div class="wrap">
            <div class="small-contact">
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/book.png" alt="book">
                <div class="content-contact">
                    <div class="cont-form">
                        <div>
                            <div class="cont-title">
                                <h4>LOS TRUCOS MÁS USADOS EN FACEBOOK E INSTAGRAM PARA CRECER TUS SEGUIDORES</h4>
                            </div>
                        </div>
                        <?php 
                            echo do_shortcode('[activecampaign form=5]');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section><?php
}

genesis();