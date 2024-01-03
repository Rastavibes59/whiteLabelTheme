<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'id'          => 'modalID',
        'class'          => 'splashScreen',
        'arbitrary_data' => array(
            'header' => '<h3 class="text-center size-h2">Lorem Ipsum</h3>',
            'body' => '<img src="https://placekitten.com/500/800" width="500" height="800">',
            'footer' => '<h3 class="text-center size-h2">Doloris sic amet</h3>',
        ),
    )
);
?>



<div id="<?php echo $args['id'] ?>" class="modal-mask flex column justify-center align-center">
    <div class="modal-close"></div>
    <div class="modal js-modal <?php echo $args['class'] ?> flex column justify-center align-center">
        <div class="modal-header animate normal fade-in slide-right delay-200ms">
            <?php echo $args['arbitrary_data']['header'] ?>
        </div>
        <div class="modal-body animate normal fade-in">
            <?php echo $args['arbitrary_data']['body'] ?>
        </div>
        <div class="modal-footer animate normal fade-in slide-left delay-400ms">
            <?php echo $args['arbitrary_data']['footer'] ?>
        </div>
    </div>
</div>

<script type="text/javascript">
            $(document).ready(function() {
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
            });

</script>