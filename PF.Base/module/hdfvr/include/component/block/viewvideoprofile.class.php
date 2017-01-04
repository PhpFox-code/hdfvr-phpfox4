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

class Hdfvr_Component_Block_Viewvideoprofile extends Phpfox_Component {
	     
    public function process() {
    	Phpfox::isUser(true);
    	
    	$userId = Phpfox::getUserId();
    	if ($this->getParam('id') != '') { $userId = $this->getParam('id'); }
    	
    	$video = array();
    	$video = Phpfox::getService('hdfvr')->getVideoProfile($userId);
    	
        $this->template()->assign(array( 
                'sHeader' => 'Video Profile', //title of the block
                'aFooter' => array(), 
                'videofile' => (!empty($video) ? $video[0]['video'] : ''), 
            )
        ); 
    } 
} 
?>