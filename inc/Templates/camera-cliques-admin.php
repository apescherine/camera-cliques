<h1>Camera Cliques Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'camera-cliques-settings-group' ); ?>
	<?php do_settings_sections( 'camera_cliques' ); ?>
	<?php submit_button(); ?>
</form>