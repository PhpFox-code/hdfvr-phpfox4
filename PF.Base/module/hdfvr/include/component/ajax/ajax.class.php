<?php
/**
 * Ajax Controler
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

class Hdfvr_Component_Ajax_Ajax extends Phpfox_Ajax {
	
	public function showRecordDialog() {
		Phpfox::isUser(true);
		
		//Phpfox::getPhrase('friend.add_to_friends')
		$this->setTitle("Record Your Video Profile");
		
		Phpfox::getBlock('hdfvr.displayHdfvr', array());			
		
		echo $this->template()->getHeader();
	}
	
	public function showVideoProfile() {
		Phpfox::isUser(true);
		
		$id = 0;
		if (isset($_GET['id'])) { $id = $_GET['id']; }
		
		//Phpfox::getPhrase('friend.add_to_friends')
		$this->setTitle("Video Profile");
		
		Phpfox::getBlock('hdfvr.viewvideoprofile', array('id' => $id));			
		
		echo $this->template()->getHeader();
	}
	
	public function postVideoProfile() {
		Phpfox::isUser(true);
		
		if ($_POST['hdfvr-video'] == '') { return false; }
		
		$result = Phpfox::getService('hdfvr')->saveVideoProfile($_POST);
		
		$this->call('hdfvrVideoProfileCallback(\''.$result.'\');$Core.loadInit();');
	}
	
	public function deleteVideoProfile() {
		Phpfox::isUser(true);
		
		$video = array();
		$video = Phpfox::getService('hdfvr')->getVideoProfile(Phpfox::getUserId());
		
		if (!empty($video)) {
			Phpfox::getService('hdfvr')->deteleVideo($video[0]['id']);
			
			$this->call("$('#hdfvr-delete-video-profile').parent().hide(); $('#hdfvr-view-video-profile').parent().hide();");
		}
	}
}
?>