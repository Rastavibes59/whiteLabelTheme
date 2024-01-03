<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'faq' => '',
        ),
    )
);

$faqs = $args['arbitrary_data']['faq'];




foreach ($faqs as $faq) : 
?>

<div class="flex column justify-flex-start align-flex-start faq collapsed w-100p <?php echo $args['class']; ?>">
    <p class="mb-0 ml-15 upperCase"><strong><?php echo $faq['question'] ?></strong></p>
    <div class="faq-answer flex column justify-flex-start align-flex-start w-100p">
    <?php echo $faq['reponse'] ?>
    </div>
</div>

<?php endforeach; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.faq').on('click', function() {
            $(this).toggleClass('collapsed');
        })
    })
</script>



