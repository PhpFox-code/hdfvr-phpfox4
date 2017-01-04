<?php
/**
 * Index Controler
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


class Hdfvr_Component_Controller_Index extends Phpfox_Component {
	
	public function process() {

		//include js and css files
		$this->template()->setHeader(array(
			'style.css' => 'module_hdfvr',
			'javascript.js' => 'module_hdfvr'
		));
		
		//example: how to assign var to template $this->template()->assign('sSampleVariable', 'Hello, I am an assigned variable.');
// 		$this->template()->assign(array(
// 			'sSampleKey1' => 'Sample Value 1',
// 			'sSampleKey2' => 'Sample Value 2',
// 			'sSampleKey3' => 'Sample Value 3',
// 			'sSampleKey4' => 'Sample Value 4'
// 		));


		//call service
// 		$aUsers = Phpfox::getService('hdfvr')->getUsers(10);
// 		$this->template()->assign('aUsers', $aUsers);
		
		//set the page header title
		$this->template()->setTitle('HDFVR Video Recorder');
		
		//set the page title
		$this->template()->setBreadcrumb('HDFVR Video Recorder');
		
		//(Phpfox::isModule('feed') ? Phpfox::getService('feed.process')->add('friend', $iFriendToUser, 0, 0, $iFriendId, Phpfox::getUserId()) : false); // http://www.phpfox.com/tracker/view/14671/
		
		//echo Phpfox::getT('user_status');
		
		//set keywords and description
		$this->template()->setMeta('keywords', 'HDFVR, Video Recorder');
		$this->template()->setMeta('description', 'HDFVR Video Recorder');
	}
}
?>