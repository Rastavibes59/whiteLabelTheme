            <section class="bg-white">
                <div id="map"></div>
                <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
                <script type="text/javascript">
                    var map = L.map('map', {
                        scrollWheelZoom: false,
                        dragging: false,
                    }).setView([mapLattitude, mapLongitude], 15);
                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1,
                        accessToken: 'pk.eyJ1IjoicmFzdGF2aWJlczU5IiwiYSI6ImNsMmhldmttNTBjOXEzam56amszbXhrOTIifQ.VVfOEeHVviM5G1WlPGYllg'
                    }).addTo(map);

                    var pleinAirIcon = L.Icon.extend({
                        options: {
                            iconSize: [38, 95], // size of the icon
                            shadowSize: [50, 64], // size of the shadow
                            iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                            shadowAnchor: [4, 62], // the same for the shadow
                            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
                        }
                    });
                    var pleinairIcon = new pleinAirIcon({
                        iconUrl: '<?php echo get_template_directory_uri() . '/assets/public/images/svg/pastille-googlemap.svg'; ?>',
                    });

                    var marker = L.marker([mapLattitude, mapLongitude], {
                        icon: pleinairIcon
                    }).addTo(map);
                    marker.bindPopup("<span class='size-big'><b>" + mapPopupTitle + "<br><span class='size-regular fc-text'>" + mapPopupText + "</span>").openPopup();
                </script>
            </section>
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
                    <p class="size-contactInfos fc-white text-center mb-0 size-formInfos">© <?php echo date("Y"); ?> - Association Productions du Jardin - Découvrez : <a href="www.jardinelectronique.com" title="festival Jardin Électronique" target="_blank">www.jardinelectronique.com</a></a></p>
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