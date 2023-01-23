<?php
// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'tabs' => '',
        ),
    )
);

$tabs = $args['arbitrary_data']['tabs'];

$total_tabs = count($tabs);
$tab_count = 1; 
$tab_content_count = 1; 

?>

<div class="tabs flex row justify-flex-start align-flex-end mt-30 mb-50">
    <?php foreach ($tabs as $tab) :  ?>
        <div class="tab flex row justify-flex-start align-flex-start">
            <input type="radio" name="group1" id="tab<?php echo $tab_count; ?>" <?php if($tab_count == 1) : ?>checked<?php endif; ?> />
            <label for="tab<?php echo $tab_count; ?>" class="flex row justify-center align-center p-10 montserrat fw-400">
                <span><?php echo $tab['tab_title'] ?></span>
            </label>
            <div class="tab-content flex column justify-flex-start align-center p-15">
                <?php echo $tab['tab_content'] ?>
            </div>
        </div>
    <?php
        $tab_count++;
        endforeach; ?>
</div>








