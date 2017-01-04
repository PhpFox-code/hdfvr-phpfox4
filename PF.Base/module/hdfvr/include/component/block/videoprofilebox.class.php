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

class Hdfvr_Component_Block_Videoprofilebox extends Phpfox_Component {
	     
    public function process() {
    	Phpfox::isUser(true);
    	
    	$video = array();
    	$video = Phpfox::getService('hdfvr')->getVideoProfile(Phpfox::getUserId());
    	
        $this->template()->assign(array( 
                'sHeader' => 'Video Profile', //title of the block
                'aFooter' => array(), 
                'ctrlStyles' => (empty($video) ? 'style="display:none;"' : ''), 
            )
        ); 
         
        return 'block'; 
    } 
} 
?>