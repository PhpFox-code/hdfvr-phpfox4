{if $HDFVRexists eq 'true'}
<div class="hdfvr-video-recorder-wrapper">
	<div id="hdfvr-video-recorder"></div>
	<input type="hidden" name="val[hdfvr-video]" id="hdfvr-video" />
</div>
{else}
	<div class="hdfvr-error-msg">For the plugin to work, you need the HDFVR files to be copied to the plugin directory! Request a <a href='http://hdfvr.com/video-recorder-for-phpfox' target='_blank'>trial</a> or review the <a href='http://hdfvr.com/video-recorder-for-phpfox-documentation' target='_blank'>Documentation!</a></div>
{/if}
{literal}{/literal}
<script type="text/javascript">
<!--
	var pluginURL = '{$pluginURL}';
	var HDFVRexists = '{$HDFVRexists}';
	var userID = '{$userID}';
	var hdfvrURL = '{$hdfvrURL}';
// -->
</script>