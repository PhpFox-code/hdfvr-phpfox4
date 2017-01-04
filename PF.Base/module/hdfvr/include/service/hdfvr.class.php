<?php
/**
 * Service Controler
 *
 * @category	Videos
 * @package		HDFVR Video Recorder for phpFox
 * @author		Radu Patron <radu@nusofthq.com>
 * @copyright	2014 Nusofthq.com
 * @license		This phpFox prduct is distributed under the terms of the GNU General Public License V2.0.
 * 				you can redistribute it and/or modify it under the terms of the GNU General Public License V2.0
 * 				as published by the Free Software Foundation, either version 3 of the License, or any later version.
 * 				You should have received a copy of the GNU General Public License along with this plugin.  If not, see <http://www.gnu.org/licenses/>.
 * @link		http://www.hdfvr.com
 * @version		1.0
 */

class Hdfvr_Service_Hdfvr extends Phpfox_Service {
	
	public function saveVideoProfile($vals) {
		$hdfvrVideoFile = $this->preParse()->prepare($vals['hdfvr-video']);
		
		$feedId = 0;
		if ($vals['post-on-wall'] == '1') {
			$aVals = array(
				'hdfvr-video' => '',
				'user_status' => 'Check out my new video profile ('.date('m.d.Y H:i:s', time()).'):',
				'group_id' => '',
				'action' => 'upload_photo_via_share',
				'privacy' => '0',
				'privacy_comment' => '',
			);
			$feedId = Phpfox::getService('user.process')->updateStatus($aVals);
		}
		
		$this->database()->update(Phpfox::getT('hdfvr_videos'), array('old'=>'1'), "(`user_id`='".(int) Phpfox::getUserId()."') AND (`type`='1')");
		
		$hdfvrValues = array(
			'user_id' => (int) Phpfox::getUserId(),
			'feed_id' => $feedId,
			'type' => 1,
			'old' => 0,
			'video' => $hdfvrVideoFile,
			'status' => 1,
			'date' => time(),
		);
	
		$this->database()->insert(Phpfox::getT('hdfvr_videos'), $hdfvrValues);
		
		if ($vals['post-on-wall'] == '1') {
			Phpfox::getService('feed')->processAjax($feedId);
		}
		
		return 'success';
	}
	
	public function getVideoProfile($userId) {
		return $this->database()->select('*')
			->from(Phpfox::getT('hdfvr_videos'))
			->where("(user_id='".$userId."') AND (type='1') AND (status='1') AND (`old`='0')")
			->order("`date` DESC")
			->limit(1)
			->execute('getRows');
	}
	
	public function getVideoByFeedId($feedId) {
		return $this->database()->select('*')
			->from(Phpfox::getT('hdfvr_videos'))
			->where("(feed_id='".$feedId."') AND (status='1')")
			->execute('getRows');
	}
	
	public function deteleVideo($videoId) {
		$this->database()->delete(Phpfox::getT('hdfvr_videos'), "id='".$videoId."'");
	}
}
?>