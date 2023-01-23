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

<div class="flex column justify-flex-start align-flex-start faq collapsed w-100p  <?php echo $args['class'] ?>">
    <div class="faq-question flex column justify-flex-start align-flex-start w-100p">
        <?php echo $faq['question'] ?>
    </div>
    <div class="faq-answer flex column justify-flex-start align-flex-start w-100p">
    <?php echo $faq['reponse'] ?>
    </div>
</div>

<?php endforeach; ?>



