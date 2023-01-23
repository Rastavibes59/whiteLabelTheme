<?php

// ACF : end Date superior to Start date

add_filter('acf/validate_value/name=event_stop', 'validate_end_date_func', 10, 4);
function validate_end_date_func($valid, $value, $field, $input) {
	if (!$valid) {
		return $valid;
	}
	$start_key = 'field_622f0f7ef91b3';
	$end_key = 'field_622f0fbcf91b4';
	$start_value = $_POST['acf'][$start_key];
	$start_value = new DateTime($start_value);
	$end_value = $_POST['acf'][$end_key];
	$end_value = new DateTime($end_value);
	
	if ($end_value <= $start_value) {
		$valid = 'La date de fin doit être supérieure à la date de début de l\'événement';
	}
	return $valid;
}


?>