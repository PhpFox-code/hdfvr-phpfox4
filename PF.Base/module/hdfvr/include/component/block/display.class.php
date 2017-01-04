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
 * to display block in html use: {module name='hdfvr.display'}
 *
 */

class Hdfvr_Component_Block_Display extends Phpfox_Component {
	
	public function process() {
		//$this->getParam('showLink')
		
		$baseURL = Phpfox::getParam('core.path');
		$pluginURL = $baseURL . 'module/hdfvr/';
		$hdfvrURL = $baseURL . 'module/hdfvr/include/plugin/hdfvr/';
		
		$HDFVRexists = "false";
		if(file_exists(PHPFOX_DIR_MODULE.'hdfvr'.PHPFOX_DS.'include'.PHPFOX_DS.'plugin'.PHPFOX_DS.'hdfvr'.PHPFOX_DS.'VideoRecorder.swf')){
			$HDFVRexists = "true";
		}
		
		$this->template()->assign(array(
			'pluginURL' => $pluginURL,
			'HDFVRexists' => $HDFVRexists,
			'userID' => Phpfox::getUserId(),
			'hdfvrURL' => $hdfvrURL,
		));
// 		echo '<pre>';
// 		var_dump($aUser);
	}
}
?>