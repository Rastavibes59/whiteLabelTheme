<?php

/* SET UP INDEXES TO START AT 0 ACF */

add_filter('acf/settings/row_index_offset', '__return_zero');


define('FS_METHOD', 'direct');


?>