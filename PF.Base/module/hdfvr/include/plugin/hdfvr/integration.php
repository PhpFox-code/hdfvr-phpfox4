<?php
	$curdir = getcwd ();
	chdir('../../../../../');
	define('PHPFOX', true);
	define('PHPFOX_DS', DIRECTORY_SEPARATOR);	
	define('PHPFOX_DIR', getcwd() . PHPFOX_DS);
	

	
	require(PHPFOX_DIR . 'include' . PHPFOX_DS . 'init.inc.php');
	chdir ($curdir);
	
	$user_id = Phpfox::getUserId();
	$is_user = Phpfox::isUser();
	//$is_admin = Phpfox::isAdmin();
	
	//$user_group_params = Phpfox::getService('user.group.setting');
	//var_dump($user_group_params);
	
	// General Settings
	$rtmpConnectionString = Phpfox::getParam('hdfvr.hdfvr_rtmp_connectionstring');
	$languageFile = Phpfox::getParam('hdfvr.hdfvr_languge_file');
	$outgoingBuffer = Phpfox::getParam('hdfvr.hdfvr_outgoing_buffer');
	$playbackBuffer = Phpfox::getParam('hdfvr.hdfvr_playback_buffer');
	$autoPlay = Phpfox::getParam('hdfvr.hdfvr_auto_play');
	$minRecordTime = Phpfox::getParam('hdfvr.hdfvr_min_record_time');
	$backgroundColor = Phpfox::getParam('hdfvr.hdfvr_background_color');
	$menuColor = Phpfox::getParam('hdfvr.hdfvr_menu_color');
	$radiusCorner = Phpfox::getParam('hdfvr.hdfvr_radius_corner');
	$showFPS = Phpfox::getParam('hdfvr.hdfvr_show_fps');
	$disableAudio = Phpfox::getParam('hdfvr.hdfvr_disable_audio');
	$countdownTimer = Phpfox::getParam('hdfvr.hdfvr_countdown_timer');
	$overlayPosition = Phpfox::getParam('hdfvr.hdfvr_overlay_position');
	$loopbackMic = Phpfox::getParam('hdfvr.hdfvr_loopback_mic');
	$showMenu = Phpfox::getParam('hdfvr.hdfvr_show_menu');
	$showTimer = Phpfox::getParam('hdfvr.hdfvr_show_timer');
	$showSoundBar = Phpfox::getParam('hdfvr.hdfvr_show_sound_bar');
	$flipImageHorizontally = Phpfox::getParam('hdfvr.hdfvr_flip_image_horizontally');
	$hidePlayButton = Phpfox::getParam('hdfvr.hdfvr_hide_play_button');
	
	//Permissions for all users groups
	$qualityUrl = Phpfox::getUserParam('hdfvr.hdfvr_quality_url');
	$recordAgain = Phpfox::getUserParam('hdfvr.hdfvr_record_again');
	$maxRecordingTime = Phpfox::getUserParam('hdfvr.hdfvr_max_recording_time');
	$overlayPath = Phpfox::getUserParam('hdfvr.hdfvr_overlay_path');
	$enablePauseWhileRecording = Phpfox::getUserParam('hdfvr.hdfvr_enable_pause_while_recording');
	
	//RTMP Connection String
	$config['connectionstring'] = $rtmpConnectionString;
	
	//language file
	$config['languagefile'] = 'translations/' . $languageFile;
	
	//quality url
	$config['qualityurl'] = 'audio_video_quality_profiles/' . $qualityUrl;
	
	//max recording time
	$config['maxRecordingTime'] = $maxRecordingTime;
	
	//outgoing buffer
	$config['outgoingBuffer'] = $outgoingBuffer;
	
	//playback buffer
	$config['playbackBuffer'] = $playbackBuffer;
	
	//auto play
	$config['autoPlay'] = $autoPlay;
	
	//min recording time
	$config["minRecordTime"] = $minRecordTime;
	
	//background color
	$config["backgroundColor"] = '0x' . $backgroundColor;
	
	//menu color
	$config["menuColor"] = '0x' . $menuColor;
	
	//radius corner
	$config["radiusCorner"] = $radiusCorner;
	
	//show FPS
	$config["showFps"] = $showFPS;
	
	//record again
	$config["recordAgain"] =  $recordAgain;
	
	//disable audio
	$config["disableAudio"] = $disableAudio;
	
	//countdown timer
	$config["countdownTimer"] = $countdownTimer;
	
	//overlay path
	$config["overlayPath"] = $overlayPath;
	
	//overlay position
	$config["overlayPosition"] = $overlayPosition;
	
	//loopback mic
	$config["loopbackMic"] = $loopbackMic;
	
	//show menu
	$config["showMenu"] = $showMenu;
	
	//show timer
	$config["showTimer"] = $showTimer;
	
	//show sound bar
	$config["showSoundBar"] = $showSoundBar;
	
	//flip image horizontally
	$config["flipImageHorizontally"] = $flipImageHorizontally;
	
	//hide play button
	$config['hidePlayButton'] = $hidePlayButton;
	
	//enable pause while recording
	$config['enablePauseWhileRecording'] = $enablePauseWhileRecording;
?>