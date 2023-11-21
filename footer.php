        <!-- SECTION BREADCRUMBS -->

        <?php if (!is_front_page()) : ?>

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
        <?php if (!is_page(1317)) : ?>
            <footer class="footer pt-60 pb-60">
                <div class="container grid cols-4 md-cols-1 gap-10 xs-pt-30">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'footerNav'
                        )
                    );
                    ?>

                    <div class="grid cols-4 md-cols-1 colspan-2 md-colspan-1">
                        <p class="size-big text-center fw-bold colspan-2 md-colspan-1 align-center flex column justify-center align-center">S'inscrire à la Newsletter :</p>
                        <?php echo do_shortcode('[contact-form-7 id="623" title="Inscription newsletter"]') ?>
                    </div>
                </div>
                <div class="container flex column justify-flex-start align-center mt-15 mb-30">
                    <p class="size-contactInfos fc-white text-center mb-0 size-formInfos">© <?php echo date("Y"); ?> - Association Productions du Jardin - autre festival electro dans la région : <a href="www.jardinelectronique.com" title="festival Jardin Électronique" target="_blank">www.jardinelectronique.com</a></a></p>
                    <a href="<?php echo site_url('//mentions-legales/'); ?>" class="size-contactInfos fc-white text-center size-formInfos fw-regular">Mentions légales</a>
                </div>
            </footer>
        <?php endif; ?>
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






                if($('.animate').length) {
                    $('.animate').each(function() {
                        if ($(this).isInViewport()) {
                            $(this).addClass('visible');
                        }
                    })
                }

                $("a[href^='#']").click(function() {
                    var target = $(this).attr('href');

                    $([document.documentElement, document.body]).animate({
                        scrollTop: $(target).offset().top
                    }, 500);
                });

                if ($('.faq').length) {
                    $('.faq').on('click', function() {
                        $(this).toggleClass('collapsed');
                    })
                }

                if ($('form.archiveFilters')) {
                    $('.fakeSelect-options-item:not(.selected)').click(function() {
                        $(this).parents().filter("form").submit();
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