<div class="hdfvr-viewprofile-player-wrapper">
	<div id="hdfvr-viewvideoprofile-player">Loading video...</div>
</div>
<script type="text/javascript">
<!--
	var videofile = '{$videofile}';

	{literal}
	jwplayer("hdfvr-viewvideoprofile-player").setup({
		'width': '450',
		'provider': 'rtmp',
		'flashplayer': hdfvrModulePath + 'static/jscript/jwplayer6.7/jwplayer.flash.swf',
		'streamer' : hdfvrRtmpConnectionString,
		'file' : hdfvrRtmpConnectionString + "/" + videofile + ".flv"
	});
	{/literal}
// -->
</script>