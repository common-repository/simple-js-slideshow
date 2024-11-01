<?php

function sjss_clean_options() {
	$nb_pic = $i = get_option('sjss_nb_pictures');
	$cleaned = false;

	while (!$cleaned) {
		$i++;
		$title = get_option('sjss_title_' . $i);

		if (!empty($title)) {
			delete_option('sjss_url_' . $i);
			delete_option('sjss_image_' . $i);
			delete_option('sjss_title_' . $i);
			delete_option('sjss_legend_' . $i);
		} else {
			$cleaned = true;
		}
	}
}

?>
