<?php
#### ADMIN OPTIONS ####
#### GENERAL PAGE ####

function sjss_admin_options() {
	?>
	<div class="wrap">
		<h2><?php _e('General options', 'simple_js_slideshow'); ?></h2>

		<?php
		if (isset($_GET['settings-updated'])) {
			sjss_clean_options();

			$isSaved = $_GET['settings-updated'];
			$messageClass = $isSaved ? "updated" : "error";
			$messageContent = $isSaved ? __('Options saved', 'simple_js_slideshow') : __('An error occurred, the options have not been saved', 'simple_js_slideshow');
			?>
			<div id="message" class="<?php echo $messageClass; ?>">
				<p><?php echo $messageContent; ?></p>
			</div>
		<?php } ?>

		<div id="poststuff" style="padding-top:10px;">
			<form method="post" action="options.php">
				<?php settings_fields('sjss_options'); ?>

				<div class="postbox">
					<div class="inside">
						<table class="form-table">
							<tr>
								<th><legend><?php _e('Number of pictures :', 'simple_js_slideshow'); ?></legend></th>
							<td>
								<label for="sjss_nb_pictures">
									<input type="text" name="sjss_nb_pictures" id="sjss_nb_pictures" value="<?php echo get_option('sjss_nb_pictures'); ?>" />
									<em><?php _e('(example : 3)', 'simple_js_slideshow'); ?></em>
								</label>
							</td>
							</tr>
							<tr>
								<th><legend><?php _e('Height :', 'simple_js_slideshow'); ?></legend></th>
							<td>
								<label for="sjss_height">
									<input type="text" name="sjss_height" id="sjss_height" value="<?php echo get_option('sjss_height'); ?>" />
									<em><?php _e('(example : 250px)', 'simple_js_slideshow'); ?></em>
								</label>
							</td>
							</tr>
							<tr>
								<th><legend><?php _e('Width :', 'simple_js_slideshow'); ?></legend></th>
							<td>
								<label for="sjss_width">
									<input type="text" name="sjss_width" id="sjss_width" value="<?php echo get_option('sjss_width'); ?>" />
									<em><?php _e('(example : 545px)', 'simple_js_slideshow'); ?></em>
								</label>
							</td>
							</tr>
							<tr>
								<th><legend><?php _e('Custom CSS :', 'simple_js_slideshow'); ?></legend></th>
							<td>
								<label for="sjss_custom_css">
									<textarea name="sjss_custom_css" id="sjss_custom_css" cols="50" rows="5"><?php echo get_option('sjss_custom_css'); ?></textarea>
								</label>
							</td>
							</tr>
						</table>
					</div>
				</div>

				<p class="submit">
					<input class="button-primary" type="submit" name="Save" value="<?php _e('Save options', 'simple_js_slideshow'); ?>" />
				</p>
			</form>
		</div>
	</div>
	<?php
}
?>