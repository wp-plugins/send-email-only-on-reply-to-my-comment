<?php
// Avoid direct access to this piece of code
if (strpos($_SERVER['SCRIPT_FILENAME'], basename(__FILE__))){
	header('Location: /');
	exit;
}

// Update options
if (isset($_POST['options'])){
	$faulty_fields = '';
	if (isset($_POST['options']['manager_page']) && !subscribe_reloaded_update_option('manager_page', $_POST['options']['manager_page'], 'text')) $faulty_fields = __('Management Page ID','subscribe-reloaded').', ';
	if (isset($_POST['options']['purge_days']) && !subscribe_reloaded_update_option('purge_days', $_POST['options']['purge_days'], 'integer')) $faulty_fields = __('Autopurge requests','subscribe-reloaded').', ';
	if (isset($_POST['options']['from_name']) && !subscribe_reloaded_update_option('from_name', $_POST['options']['from_name'], 'text')) $faulty_fields = __('Sender name','subscribe-reloaded').', ';
	if (isset($_POST['options']['from_email']) && !subscribe_reloaded_update_option('from_email', $_POST['options']['from_email'], 'text')) $faulty_fields = __('Sender email address','subscribe-reloaded').', ';
	if (isset($_POST['options']['checked_by_default']) && !subscribe_reloaded_update_option('checked_by_default', $_POST['options']['checked_by_default'], 'yesno')) $faulty_fields = __('Checked by default','subscribe-reloaded').', ';
	if (isset($_POST['options']['checkbox_class']) && !subscribe_reloaded_update_option('checkbox_class', $_POST['options']['checkbox_class'], 'text')) $faulty_fields = __('Custom CSS Class','subscribe-reloaded').', ';
	if (isset($_POST['options']['checkbox_inline_style']) && !subscribe_reloaded_update_option('checkbox_inline_style', $_POST['options']['checkbox_inline_style'], 'text')) $faulty_fields = __('Custom inline style','subscribe-reloaded').', ';
	if (isset($_POST['options']['checkbox_html']) && !subscribe_reloaded_update_option('checkbox_html', $_POST['options']['checkbox_html'], 'text')) $faulty_fields = __('Custom HTML','subscribe-reloaded').', ';
	if (isset($_POST['options']['enable_double_check']) && !subscribe_reloaded_update_option('enable_double_check', $_POST['options']['enable_double_check'], 'yesno')) $faulty_fields = __('Enable double check','subscribe-reloaded').', ';
	if (isset($_POST['options']['notify_authors']) && !subscribe_reloaded_update_option('notify_authors', $_POST['options']['notify_authors'], 'yesno')) $faulty_fields = __('Notify authors','subscribe-reloaded').', ';
	if (isset($_POST['options']['enable_html_emails']) && !subscribe_reloaded_update_option('enable_html_emails', $_POST['options']['enable_html_emails'], 'yesno')) $faulty_fields = __('Enable HTML emails','subscribe-reloaded').', ';
	if (isset($_POST['options']['process_trackbacks']) && !subscribe_reloaded_update_option('process_trackbacks', $_POST['options']['process_trackbacks'], 'yesno')) $faulty_fields = __('Send trackbacks','subscribe-reloaded').', ';
	if (isset($_POST['options']['enable_admin_messages']) && !subscribe_reloaded_update_option('enable_admin_messages', $_POST['options']['enable_admin_messages'], 'yesno')) $faulty_fields = __('Notify admin','subscribe-reloaded').', ';
	if (isset($_POST['options']['admin_subscribe']) && !subscribe_reloaded_update_option('admin_subscribe', $_POST['options']['admin_subscribe'], 'yesno')) $faulty_fields = __('Let admin subscribe','subscribe-reloaded').', ';

	// Display an alert in the admin interface if something went wrong
	echo '<div class="updated fade"><p>';
	if (empty($faulty_fields)){
			_e('Your settings have been successfully updated.','subscribe-reloaded');
	}
	else{
		_e('There was an error updating the following fields:','subscribe-reloaded');
		echo ' <strong>'.substr($faulty_fields,0,-2).'</strong>';
	}
	echo "</p></div>\n";
}

?>
<form action="admin.php?page=send-email-only-on-reply-to-my-comment/options/index.php&subscribepanel=<?php echo $current_panel ?>" method="post">
<table class="form-table <?php echo $wp_locale->text_direction ?>">
<tbody>
	<tr>
		<th scope="row"><label for="from_name"><?php _e('Sender name','subscribe-reloaded') ?></label></th>
		<td><input type="text" name="options[from_name]" id="from_name" value="<?php echo subscribe_reloaded_get_option('from_name'); ?>" size="50">
			<div class="description"><?php _e('Name to use for the "from" field when sending a new notification to the user.','subscribe-reloaded'); ?></div></td>
	</tr>
	<tr>
		<th scope="row"><label for="from_email"><?php _e('Sender email address','subscribe-reloaded') ?></label></th>
		<td><input type="text" name="options[from_email]" id="from_email" value="<?php echo subscribe_reloaded_get_option('from_email'); ?>" size="50">
			<div class="description"><?php _e('Email address to use for the "from" field when sending a new notification to the user.','subscribe-reloaded'); ?></div></td>
	</tr>
	<tr>
		<th scope="row"><label for="checked_by_default"><?php _e('Checked by default','subscribe-reloaded') ?></label></th>
		<td>
			<input type="radio" name="options[checked_by_default]" id="checked_by_default" value="yes"<?php echo (subscribe_reloaded_get_option('checked_by_default') == 'yes')?' checked="checked"':''; ?>> <?php _e('Yes','subscribe-reloaded') ?> &nbsp; &nbsp; &nbsp;
			<input type="radio" name="options[checked_by_default]" value="no" <?php echo (subscribe_reloaded_get_option('checked_by_default') == 'no')?'  checked="checked"':''; ?>> <?php _e('No','subscribe-reloaded') ?>
			<div class="description"><?php _e('Decide if the checkbox should be checked by default or not.','subscribe-reloaded'); ?></div></td>
	</tr>
	</tbody>
</table>
<p class="submit"><input type="submit" value="<?php _e('Save Changes') ?>" class="button-primary" name="Submit"></p>
</form>