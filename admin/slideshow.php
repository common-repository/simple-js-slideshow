<?php
#### ADMIN OPTIONS ####
#### SLIDESHOW PAGE ####

function sjss_admin_slideshow() {
	?>
	<script language="JavaScript">
		function sjss_delete() {
			for(i = 1;i<<?php echo NB_PICTURES + 1; ?>;i++){
				document.getElementById('sjss_title_'+i).value = "";
				document.getElementById('sjss_legend_'+i).value = "";
				document.getElementById('sjss_image_'+i).value = "";
				document.getElementById('sjss_url_'+i).value = "";
			}
		}
																						
		function sjss_shift() {
			var lastId = <?php echo NB_PICTURES; ?>;
			var title = document.getElementById('sjss_title_'+lastId).value;
			var legend = document.getElementById('sjss_legend_'+lastId).value;
			var image = document.getElementById('sjss_image_'+lastId).value;
			var url = document.getElementById('sjss_url_'+lastId).value;
																								
			for(i = <?php echo NB_PICTURES; ?>;i>1;i--){
				document.getElementById('sjss_title_'+i).value = document.getElementById('sjss_title_'+(i-1)).value;
				document.getElementById('sjss_legend_'+i).value = document.getElementById('sjss_legend_'+(i-1)).value;
				document.getElementById('sjss_image_'+i).value = document.getElementById('sjss_image_'+(i-1)).value;
				document.getElementById('sjss_url_'+i).value = document.getElementById('sjss_url_'+(i-1)).value;
			}
			document.getElementById('sjss_title_1').value = title;
			document.getElementById('sjss_legend_1').value = legend;
			document.getElementById('sjss_image_1').value = image;
			document.getElementById('sjss_url_1').value = url;
		}
																						
		function sjss_add() {
			sjss_shift();
			document.getElementById('sjss_title_1').value = "";
			document.getElementById('sjss_legend_1').value = "";
			document.getElementById('sjss_image_1').value = "";
			document.getElementById('sjss_url_1').value = "";
		}
	</script>

	<div class="wrap">
		<h2><?php _e('Slideshow options', 'simple_js_slideshow'); ?></h2>

		<?php
		if (isset($_GET['settings-updated'])) {
			$isSaved = $_GET['settings-updated'];
			$messageClass = $isSaved ? "updated" : "error";
			$messageContent = $isSaved ? __('Slideshow saved', 'simple_js_slideshow') : __('An error occurred, the slideshow has not been saved', 'simple_js_slideshow');
			?>
			<div id="message" class="<?php echo $messageClass; ?>">
				<p><?php echo $messageContent; ?></p>
			</div>
		<?php } ?>

		<div style="height: 30px; margin-top: 10px;">
			<a class="button" href="javascript:sjss_add();" title="<?php _e('Shift and delete the first picture', 'simple_js_slideshow'); ?>"><?php _e('Add', 'simple_js_slideshow'); ?></a>
			<a class="button" href="javascript:sjss_shift();"><?php _e('Shift', 'simple_js_slideshow'); ?></a>
			<a class="button" href="javascript:sjss_delete();"><?php _e('Delete all', 'simple_js_slideshow'); ?></a>
		</div>

		<div id="poststuff" style="padding-top:10px;">
			<form method="post" action="options.php">
				<?php settings_fields('sjss_slideshow'); ?>

				<?php
				for ($i = 1; $i < NB_PICTURES + 1; $i++) {
					?>
					<div class="postbox">
						<h3><?php printf(__('Picture #%d', 'simple_js_slideshow'), $i); ?></h3>

						<table class="form-table">
							<tr>
								<th><legend><?php _e('Title :', 'simple_js_slideshow'); ?></legend></th>
							<td>
								<label for="sjss_title_<?php echo $i; ?>">
									<input type="text" name="sjss_title_<?php echo $i; ?>" id="sjss_title_<?php echo $i; ?>" value="<?php echo get_option('sjss_title_' . $i); ?>" size="100" />
								</label>
							</td>
							</tr>
							<tr>
								<th><legend><?php _e('Legend :', 'simple_js_slideshow'); ?></legend></th>
							<td>
								<label for="sjss_legend_<?php echo $i; ?>">
									<input type="text" name="sjss_legend_<?php echo $i; ?>" id="sjss_legend_<?php echo $i; ?>" value="<?php echo get_option('sjss_legend_' . $i); ?>" size="100" />
								</label>
							</td>
							</tr>
							<tr>
								<th><legend><?php _e('Picture URL :', 'simple_js_slideshow'); ?></legend></th>
							<td>
								<label for="sjss_image_<?php echo $i; ?>">
									<input type="text" name="sjss_image_<?php echo $i; ?>" id="sjss_image_<?php echo $i; ?>" value="<?php echo get_option('sjss_image_' . $i); ?>" size="100" />
								</label>
							</td>
							</tr>
							<tr>
								<th><legend><?php _e('Link URL :', 'simple_js_slideshow'); ?></legend></th>
							<td>
								<label for="sjss_url_<?php echo $i; ?>">
									<input type="text" name="sjss_url_<?php echo $i; ?>" id="sjss_url_<?php echo $i; ?>" value="<?php echo get_option('sjss_url_' . $i); ?>" size="100" />
								</label>
							</td>
							</tr>
						</table>
					</div>
					<?php
				}
				?>

				<p class="submit">
					<input class="button-primary" type="submit" name="Save" value="<?php _e('Save slideshow', 'simple_js_slideshow'); ?>" />
				</p>
			</form>
		</div>
		<?php
	}
	?>