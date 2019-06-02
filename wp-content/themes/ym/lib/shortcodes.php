<?php
/* yazz Shortcodes
****************************/

/*	Flags Shortcodes */
add_shortcode('banderas', 'flags_function');
function flags_function($atts, $content){
    $out = '';
    if($flags = get_field('banderas', 'option')):
        $out .= '<div class="content-flag">';
        foreach($flags as $flag){
            $out .= '<div class="flag" style="background-image:url('.$flag['anadir_bandera'].');"></div>';
        }
        $out .= '</div>';
    endif;
    return $out;
}

/* Quotes */
add_shortcode('cita', 'quote_function');
function quote_function($atts, $content){
   	$out = '';
   	$out .= '<div class="c-quote"><p>'.$content.'</p></div>';
   	return $out;
}

add_shortcode( 'pupular_posts' , 'pupular_posts_function' );
function pupular_posts_function($atts, $content) {

  $a = shortcode_atts( array(
      'title'       =>  'LO MÁS POPULAR',
      'limit'       =>  '2',
  ), $atts );

    $args = array( 
        'posts_per_page'  => $a['limit'],
        'post_type'       => 'post',
        'post_status'     => 'publish',
        'orderby'         => 'wpb_post_views_count',
        'orderby'         => 'post_date',
        'order'           => 'DESC',
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts()):
        ?>
          <section class="widget pupular-posts"> 
            <h3 class="widgettitle widget-title"><?php echo $a['title'] ?></h3>
            <?php
            $count = 1;
            while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                <div class="item-posts">
                    <div class="i-left">
                          <h2><?php echo $count; ?></h2>
                    </div>
                    <div class="i-center">
                      <a href="<?php echo get_permalink()?>">
                        <h4><?php echo the_title(); ?></h4>
                      </a>
                    </div>
                    <?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail" );
                          // echo $thumbnail[0];
                    ?>
                    <a href="<?php echo get_permalink()?>">
                    <div class="i-right" style="background-image: url(<?php echo $thumbnail[0]; ?>)"></div></a>
                </div>
                <?php
                $count ++;
            endwhile;
            wp_reset_query();
            ?>
          </section>
            <?php
    endif;
}

add_shortcode( 'clases_virtuales' , 'clases_virtuales_function' );
function clases_virtuales_function($atts, $content) {

    $home_hours = get_field('clases_virtuales','option');
    if($home_hours):
        ?>
    <section class="home-hours c-hours shortcode" data-aos="fade-zoom-in" data-aos-easing="ease-in-sine" data-aos-delay="1000" data-aos-offset="0" data-aos-once="true">
        <div class="wrap">
            <div class="row">
                <div class="col-md-7">
                    <header class="block-title">
                        <img src="<?php echo get_stylesheet_directory_uri()?>/images/flive.png" style="width: 100px;" /><br>
                    <?php
                        $day = $home_hours['day'];
                        $hour = $home_hours['hour'];
                        $am_pm = $home_hours['am_pm'];

                        echo '<span class="small-title">'.$home_hours['small_title'].'</span>';
                        echo '<div class="title-animate"><div><h2 class="animate-title-text right">'.$day.' '.$hour.''.$am_pm.'</h2></div></div>';
                        echo '<h3>'.$home_hours['subtitle'].'</h3>';
                    ?>
                    <img class="d-block d-md-none circle-mob" src="<?php echo get_stylesheet_directory_uri()?>/images/time_curses.png" />
                    </header>
                    <div class="home-history-content">
                        <?php echo $home_hours['content'];?>
                        <a class="btn-purple" href="<?php echo $home_hours['button']['url']?>"><?php echo $home_hours['button']['title']?></a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="home_history_image d-none d-md-block">
                        <img src="<?php echo get_stylesheet_directory_uri()?>/images/yazmin-hour.png" />
                    </div>                    
                </div>
            </div> 
        </div>
        <div class="animate-face">
            <div class="animate-img" ></div>
        </div>
    </section>
        <?php
    endif;

}