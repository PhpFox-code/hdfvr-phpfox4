var recordVideo = false;

var mobile = false;
var ua = navigator.userAgent.toLowerCase();
if(navigator.appVersion.indexOf("iPad") != -1 || navigator.appVersion.indexOf("iPhone") != -1 || ua.indexOf("android") != -1 || ua.indexOf("ipod") != -1 || ua.indexOf("windows ce") != -1 || ua.indexOf("windows phone") != -1){
	mobile = true;
}

if(mobile == false){
	//swfobject.embedSWF(hdfvrURL + "VideoRecorder.swf", "hdfvr-video-recorder", "320", "270", "11.2.0", "", flashvars, params, attributes);
}

function showHdfvrRecorder(recorderId, hdfvrHolder) {
	var flashvars = {
		userId : userID,
		//qualityurl: hdfvrURL + "audio_video_quality_profiles/320x240x30x90.xml",
		recorderId: recorderId,
		sscode: "php",
		lstext : "Loading Settings...",
	};
	var params = {
		quality : "high",
		bgcolor : "#000000",
		play : "true",
		loop : "false",
		allowscriptaccess: "sameDomain",
		base : hdfvrURL
	};
	var attributes = {
		name : "VideoRecorder",
		id :   "VideoRecorder",
		align : "middle"
	};
	
	var mobile = false;
	var ua = navigator.userAgent.toLowerCase();
	if(navigator.appVersion.indexOf("iPad") != -1 || navigator.appVersion.indexOf("iPhone") != -1 || ua.indexOf("android") != -1 || ua.indexOf("ipod") != -1 || ua.indexOf("windows ce") != -1 || ua.indexOf("windows phone") != -1){
		mobile = true;
	}
	
	if(mobile == false){
		swfobject.embedSWF(hdfvrURL + "VideoRecorder.swf", hdfvrHolder, "320", "270", "11.2.0", "", flashvars, params, attributes);
	}
}

function hideHdfvrRecorder() {
	$('.hdfvr-video-recorder-wrapper').hide();
	$('.hdfvr-video-recorder-wrapper').html('<div id="hdfvr-video-recorder"></div><input type="hidden" name="val[hdfvr-video]" id="hdfvr-video" />');
	recordVideo = false;
	hdfvrRecording = false;
}

function hdfvrSaveVideoProfile() {
	if ($('#dialog-hdfvr-video').val() == '') {
		
		alert('Please record your video profile!'); return false;
	}
	
	var postOnWall = 0;
	if ($('#hdfvr-videoprofile-wall').prop('checked')) {
		postOnWall = 1;
	}
	
	$.ajaxCall('hdfvr.postVideoProfile', 'hdfvr-video=' + $('#dialog-hdfvr-video').val() + '&post-on-wall=' + postOnWall);
}

function hdfvrVideoProfileCallback(result) {
	if (result == 'success') {
		tb_remove();
		alert('The video profile has been saved!');
		$('#hdfvr-delete-video-profile').parent().show();
		$('#hdfvr-view-video-profile').parent().show();
	} else {
		alert('Error: An error has occured, please contact an administrator!');
	}
}

$Behavior.onClickEvents = function(){
	$('.activity_feed_form_attach li a').click(function(){
		if ($(this).attr('rel') != 'hdfvr-record-video') {
			hideHdfvrRecorder();
		}
		return false;
	});
	
	$('#hdfvr-record-video').click(function() {
		$(this).addClass('active');
		recordVideo = true;
		showHdfvrRecorder('hdfvr-feed-video', 'hdfvr-video-recorder');
		$('.hdfvr-video-recorder-wrapper').show();
		$('#activity_feed_submit').removeClass('button_not_active');
	});
	
	$('#activity_feed_submit').click(function() {
		if (recordVideo) {
			if (hdfvrRecording) {
				alert('You have to finish the recording first!'); return false;
			}

			if ($('#global_attachment_status textarea').val() == '' || $('#global_attachment_status textarea').val() == 'What\'s on your mind?') { 
				$('#global_attachment_status textarea').focus();
				alert('Please complete video description!');
				return false;
			}
		}
	});
	
	$('#hdfvr-record-video-profile').click(function () {
		$Core.box('hdfvr.showRecordDialog', 400, '');
		
		return false;
	});
	
	$('#hdfvr-delete-video-profile').click(function () {
		if (confirm('Are you sure you want to delete your video profile?')) {
			$.ajaxCall('hdfvr.deleteVideoProfile', '');
		}
		return false;
	});
	
	$('#hdfvr-view-video-profile').click(function () {
		$Core.box('hdfvr.showVideoProfile', 480, '');
		
		return false;
	});
	
	$('.ajax_link').click(function () {
		var vals = $(this).children('span').html().split('-');
		if (vals[0] == 'hdfvr.showVideoProfile') {
			$Core.box('hdfvr.showVideoProfile', 480, 'id=' + vals[1]);
			return false;
		}
	});
}

$Behavior.jwplayerPlayer = function() {
	$('.hdfvr-player').each(function(){
		jwplayer(this.id).setup({
			'width': '450',
			'provider': 'rtmp',
			'flashplayer': hdfvrModulePath + 'static/jscript/jwplayer6.7/jwplayer.flash.swf',
			'streamer' : hdfvrRtmpConnectionString,
			'file' : hdfvrRtmpConnectionString + "/" + $('#' + this.id).attr('vdata') + ".flv"
		});
	});
}