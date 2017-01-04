<div class="dialog-hdfvr-video-recorder-wrapper">
	{if $HDFVRexists eq 'true'}
	<div id="dialog-hdfvr-video-recorder"></div>
	<h2>Usage Instructions:</h2>
	<ul>
		<li>1. Click the RECORD button.</li>
		<li>2. Click the Stop button after you finishied the recording.</li>
		<li>3. If you want to review the recording, pres PLAY.</li>
		<li>4. To add the video to your profile, click [Add Video To My Profile].</li>
	</ul>
	<div>
		<label>
			<input type="checkbox" name="hdfvr-videoprofile-wall" id="hdfvr-videoprofile-wall" /> Post to Wall
		</label>
	</div>
	<div>
		<input type="button" name="hdfvr-post-video-profile" onclick="hdfvrSaveVideoProfile()" value="Add Video To My Profile" class="button" />
	</div>
	<input type="hidden" name="dialog-hdfvr-video" id="dialog-hdfvr-video" />
	{else}
	<div class="hdfvr-error-msg">For the plugin to work, you need the HDFVR files to be copied to the plugin directory! Request a <a href='http://hdfvr.com/video-recorder-for-phpfox' target='_blank'>trial</a> or review the <a href='http://hdfvr.com/video-recorder-for-phpfox-documentation' target='_blank'>Documentation!</a></div>
	{/if}
</div>
{literal}{/literal}
<script type="text/javascript">
<!--
	var pluginURL = '{$pluginURL}';
	var HDFVRexists = '{$HDFVRexists}';
	var userID = '{$userID}';
	var hdfvrURL = '{$hdfvrURL}';

	showHdfvrRecorder('hdfvr-video-profile', 'dialog-hdfvr-video-recorder');
// -->
</script>