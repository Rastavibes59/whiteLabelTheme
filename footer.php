        <!-- SECTION BREADCRUMBS -->

        <?php if (!is_front_page() && function_exists('yoast_breadcrumb')) : ?>

            <?php
            $isJumbo = false;
            get_template_part(
                'includes/common/breadcrumbs',
                '',
                array(
                    'class'             => '',
                    'arbitrary_data'    => array(
                        'isJumbo' => $isJumbo,
                    ),
                )
            ); ?>
        <?php endif; ?>


        </div>
        <?php             
            $rightFooterContent = get_theme_mod('right_footer_content', 'Hello World !');
            $bottomFooterContent = get_theme_mod('bottom_footer_content', 'Réalisation : <a href="https://www.ateliers-art-strong.fr" target="_blank" title="Ateliers Art-Strong">Ateliers Art-Strong</a>');
        ?>
            <footer class="footer pt-60 pb-60">
                <div class="container grid cols-4 md-cols-1 gap-30 xs-pt-30">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'footerNav'
                        )
                    );
                    ?>
                    <?php if(strlen($rightFooterContent) > 0) : ?>
                    <div class="flex column justify-center align-flex-start colspan-2 md-colspan-1">
                        <p class="size-big text-center fw-bold align-center flex column justify-center align-flex-start">S'inscrire à la Newsletter :</p>
                        <?php if($rightFooterContent[0] == '[' && $rightFooterContent[strlen($rightFooterContent) - 1] == ']') {
                            echo do_shortcode($rightFooterContent);
                        } else {
                            echo $rightFooterContent;
                        } ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="container flex column justify-flex-start align-center mt-15 mb-30">
                    <p id="bottomFooterSection" class="size-contactInfos  text-center mb-0 size-formInfos"><?php echo $bottomFooterContent; ?></p>
                    <a href="<?php echo site_url('//mentions-legales/'); ?>" class="size-contactInfos  text-center size-formInfos fw-regular">Mentions légales</a>
                </div>
            </footer>
        </div>

        <!-- SECTION MODALS -->

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
                    $modalID = 'cookieModal';
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


        <?php wp_footer(); ?>
        <script type="text/javascript">

            /* ANIMATED BURGER MENU  */
            var icon = document.getElementById("hamburger-icon");
            var icon1 = document.getElementById("a");
            var icon2 = document.getElementById("b");
            var icon3 = document.getElementById("c");
            var nav = document.getElementById('mainNav');
            var blue = document.getElementById("blue");

            icon.addEventListener('touchstart', function() {
                icon1.classList.toggle('a');
                icon2.classList.toggle('c');
                icon3.classList.toggle('b');
                nav.classList.toggle('show');
                blue.classList.toggle('slide');
            });

            $(document).ready(function() {



                if ($('.js-modal').length > 0) {

                    if (Cookies.get('modal_shown') == null) {
                        var modalToOpen = $('#cookieModal')
                        openModal(modalToOpen);
                        Cookies.set('modal_shown', true, {
                            expires: 7
                        })
                    }
                    var modals = $('.js-modal');

                    modals.each(function() {
                        var modal = $(this).parent('.modal-mask');

                        $('.modal-mask:not(.modal), .modal-close').on('click', function() {
                            closeModal(modal);
                        })
                    })
                }

                $('select:not(.ui-datepicker-month)').each(function() {
                    createFakeSelect ($(this).attr('id'));
                })

                initSelect();
    



                if($('.animate').length) {
                    $('.animate').each(function() {
                        if ($(this).isInViewport()) {
                            $(this).addClass('visible');
                        }
                    })
                }

                $("a[href^='#']").click(function() {
                    var target = $(this).attr('href');
                    if($(target).length > 1) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $(target).offset().top
                        }, 500);

                    }

                });

                if ($('.faq').length) {
                    $('.faq').on('click', function() {
                        $(this).toggleClass('collapsed');
                    })
                }

                if ($('form.archiveFilters')) {
                    $('.fakeSelect-options-item:not(.selected)').click(function() {
                        //$(this).parents().filter("form").submit();
                    })

                }


            })

            $(window).on('resize scroll', function() {

                $('.animate').each(function() {
                    if ($(this).isInViewport()) {
                        $(this).addClass('visible');
                    }
                });

                var scroll = $(window).scrollTop();

                if (scroll >= 100) {
                    $(".header").addClass("scrolled");
                } else {
                    $(".header").removeClass("scrolled");
                }
            });
        </script>
        <script>



        </script>
        </body>





        </html>