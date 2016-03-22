<?php $url = AppletInstance::getValue('url');?>
<?php $message_format = AppletInstance::getValue('message_format') ?: "Incoming call from %caller%" ;?>
<div class="vbx-applet curling">
	<h2 class="settings-title">Post to Slack</h2>
	<div class="vbx-applet-fieldset">
		<p>This applet will perform a POST to the Slack URL you specify below.<br /></p>
		<fieldset class="vbx-input-container input">
		<h3>Slack Webhook URL:</h3>
		<br />
		<div class="vbx-full-pane">
			<input class="curling_url medium" name="url" value="<?php echo $url;?>"/>
			<br />
		</div>
		<h3>Slack URL:</h3>
		<br />
		<div class="vbx-full-pane">
			<input class="curling_message_format medium" name="message_format" value="<?php echo $message_format;?>"/>
			<br />
		</div>
		</fieldset>
		<div id="curl_result"></div>
		<h3>Next...</h3>
		<br />
		<div class="vbx-full-pane">
			<?php echo AppletUI::dropZone('next'); ?>
		</div>
	</div>

</div>
