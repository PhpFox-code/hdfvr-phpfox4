<?php 
$video = array();
$video = Phpfox::getService('hdfvr')->getVideoProfile($aUser['user_id']);

if (!empty($video)) {
	$aMenus[] = array(
			'phrase' => 'View Video Profile<span style="display:none;">hdfvr.showVideoProfile-'.$aUser['user_id'].'</span>',
			'url' => '#',
			'icon' => 'feed/video.png'
	);
}
?>