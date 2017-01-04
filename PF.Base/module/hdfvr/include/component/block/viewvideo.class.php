<?php
/**
 * Block Controler
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

/**
 * HELP
 * to display block in html use: {module name='hdfvr.viewvideo'}
 *
 */

class Hdfvr_Component_Block_Viewvideo extends Phpfox_Component {
	
	public function process() {
		Phpfox::isUser(true);
		
		$baseURL = Phpfox::getParam('core.path');
		$pluginURL = $baseURL . 'module/hdfvr/';
		$hdfvrURL = $baseURL . 'module/hdfvr/include/plugin/hdfvr/';
		
		$feedID = $this->getParam('feed_id');
		$userID = Phpfox::getUserId();
		
		$video = array();
		$video = Phpfox::getService('hdfvr')->getVideoByFeedId($feedID);
		
		$this->template()->assign(array(
			'pluginURL' => $pluginURL,
			'hdfvrURL' => $hdfvrURL,
			'userID' => $userID,
			'feedID' => $feedID,
			'video' => $video,
			'videoFile' => (!empty($video)?$video[0]['video']:''),
		));
	}
}
?>