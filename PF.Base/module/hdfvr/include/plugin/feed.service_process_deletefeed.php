<?php 
//check video
$video = Phpfox::getService('hdfvr')->getVideoByFeedId($aFeed['feed_id']);

if (!empty($video) && $video[0]['type'] == '0') {
	Phpfox::getService('hdfvr')->deteleVideo($video[0]['id']);
}
?>