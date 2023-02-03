       </div>
       <footer class="footer pt-60 pb-60">
           <div class="container grid cols-2 md-cols-1 gap-10 xs-pt-30">
               <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'menu_class' => 'footerNav'
                    )
                );
                ?>

               <div class="flex column justify-center align-flex-start">
                   <?php if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }; ?>
               </div>
           </div>
           <div class="container flex column justify-center align-center mt-15 mb-30">
               <p class="size-contactInfos fc-white text-center mb-00 size-formInfos">© 2023 Équi'Grimpe • Réalisation : <a href="http://www.ateliers-art-strong.fr" target="_blank" title="Ateliers Art-Strong" alt="Ateliers Art-Strong">Art-Strong</a></p>
               <a href="<?php echo site_url('//mentions-legales/'); ?>" class="size-contactInfos fc-white text-center size-formInfos fw-400">Mentions légales</a>
           </div>
       </footer>
       </div>

       <?php
        $args = array(
            'post_type'         => 'modals',
            'order'             => 'ASC',
            'posts_per_page'    => -1,
        );
        $query = new WP_Query($args);

        $countModals = 0;

        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                if (get_field('splashscreen') == true) {
                    $modalID = 'splashScreen';
                    $modalClass = 'splashScreen';
                } else {
                    $modalID = get_post_field('', get_post());
                    $modalClass = '';
                }

                get_template_part(
                    'includes/common/modal',
                    '',
                    array(
                        'id'          => $modalID,
                        'class'          => $modalClass,
                        'arbitrary_data' => array(
                            'header' => '<h3 class="text-center size-h2">' . get_field('header') . '</h3>',
                            'body' => get_field('body'),
                            'footer' => '<h3 class="text-center size-h2">' . get_field('footer') . '</h3>',
                        ),
                    )
                );
                $countModals++;

            endwhile;
        endif;
        wp_reset_query();
        ?>


       <div id="orderModal" class="modal-mask flex column justify-center align-center">
           <div class="modal-close"></div>
           <div class="modal js-modal flex column justify-center align-center bg-white p-15">
               <div class="modal-header">
                   <h3>Commander <span class="orderName"></span></h3>
               </div>
               <div class="modal-body">
                   <?php echo do_shortcode('[contact-form-7 id="1656" title="Formulaire de commande"]'); ?>
               </div>
           </div>
       </div>

       <div class="scrollToTop flex column justify-center align-center"><img src="<?php echo get_template_directory_uri() ?>/assets/public/images/svg/scrollTop.svg' " alt="Retour en haut de la page" width="30" height="30"></div>

       <?php wp_footer(); ?>

       </body>

       <script type="text/javascript">
           $(document).ready(function() {

               /* HANDLE SLIDERS */

               if ($('.slider').length) {

                   $('.slider').each(function(key, item) {

                       var sliderIdName = 'slider' + key;
                       var sliderNavIdName = 'sliderNav' + key;

                       this.id = sliderIdName;
                       $('.sliderNav')[key].id = sliderNavIdName;

                       var sliderId = '#' + sliderIdName;
                       var sliderNavId = '#' + sliderNavIdName;

                       $(sliderId).slick({
                           infinite: true,
                           slide: '.sliderItem',
                           slidesToShow: 1,
                           slidesToScroll: 1,
                           speed: 500,
                           autoplay: true,
                           autoplaySpeed: 5000,
                           pauseOnHover: true,
                           pauseOnFocus: true,
                           centerMode: false,
                           arrows: true,
                           prevArrow: $(sliderNavId + ' .sliderPrev'),
                           nextArrow: $(sliderNavId + ' .sliderNext'),

                           dots: false,
                       });

                   });

               }


               /* HANDLE MODALS */

               if ($('.js-modal').length > 0) {

                   /* SPLASH SCREEN COOKIES HANDLED MODALS */

                   var isSplashscreen = $('.splashScreen').length > 0;

                   if (isSplashscreen && Cookies.get('modal_shown') == null) {
                       var modalToOpen = '#splashScreen'
                       openModal(modalToOpen);
                       Cookies.set('modal_shown', true, {
                           expires: 7
                       })
                   }
                   var modals = $('.js-modal');

                   /* HANDLE MODAL CLOSE */

                   modals.each(function() {
                       var modal = $(this).parent('.modal-mask');

                       $('.modal-mask, .modal-close').on('click', function(e) {
                           closeModal(modal);
                       });

                       $('.modal').on('click', function(e) {
                           e.stopPropagation();
                       });
                   })
               }

               /* ANIMATED BLOCKS INITIALISATIONS */

               $('.animate').each(function() {
                   if ($(this).isInViewport()) {
                       $(this).addClass('visible');
                   }
               })

               /* ANIMATED FIXED NAVIGATION */

               var scroll = $(window).scrollTop();

               if (scroll >= 100) {
                   /* $(".header").addClass("scrolled"); */
                   $(".scrollToTop").addClass("scrolled");
               } else {
                   /* $(".header").removeClass("scrolled"); */
                   $(".scrollToTop").removeClass("scrolled");
               }


               /* ANIMATED SCROLLTO */

               $("a[href^='#']").click(function() {
                   var target = $(this).attr('href');

                   $([document.documentElement, document.body]).animate({
                       scrollTop: $(target).offset().top
                   }, 500);
               });

               /* ANIMATED SCROLLTOTOP */

               $(".scrollToTop").click(function() {

                   $([document.documentElement, document.body]).animate({
                       scrollTop: 0,
                   }, 500);
               });


               /* HANDLE ACCORDEON BLOCKS */

               if ($('.faq').length) {
                   $('.faq-question').on('click', function() {
                       $(this).parent().removeClass('collapsed');
                   });
                   $('.faq-answer').on('click', function() {
                       $(this).parent().addClass('collapsed');
                   });
               }

               /* ONSCROLL INITIALISATIONS */

               $(window).on('resize scroll', function() {

                   /* ANIMATED BLOCKS */

                   $('.animate').each(function() {
                       if ($(this).isInViewport()) {
                           $(this).addClass('visible');
                       }
                   });

                   /* ANIMATED FIXED NAVIGATION */

                   var scroll = $(window).scrollTop();

                   if (scroll >= 100) {
                       $(".header").addClass("scrolled");
                       $(".scrollToTop").addClass("scrolled");
                   } else {
                       $(".header").removeClass("scrolled");
                       $(".scrollToTop").removeClass("scrolled");
                   }
               });

               /* PARALLAX HEADER */

               var screenWidth = window.innerWidth;
               if (screenWidth > 1024) {
                   if (document.getElementById('parallax_jumbo')) {
                       var scene = document.getElementById('parallax_jumbo');
                       var parallaxInstance = new Parallax(scene, {
                           hoverOnly: true,
                           relativeInput: true,

                       });
                   }
               }

           })
       </script>



       </html>