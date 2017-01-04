<?php 
if (@isset($aVals['hdfvr-video'])) {
	$hdfvrVideoFile = $this->preParse()->prepare($aVals['hdfvr-video']);
	
	if ($hdfvrVideoFile != '') {
		$hdfvrValues = array(
			'user_id' => (int) Phpfox::getUserId(),
			'feed_id' => $this->_iLastId,
			'type' => 0,
			'old' => 0,
			'video' => $hdfvrVideoFile,
			'status' => 1,
			'date' => time(),
		);
		
		$this->database()->insert(Phpfox::getT('hdfvr_videos'), $hdfvrValues);
	}
	?>
	<script type="text/javascript">
	<!--
		hideHdfvrRecorder();
	// -->
	</script>
<?php } ?>