<?php
/* -------------------------------------------------------------------------------------
* @Plugin Name: Titles
* @Description: Parse titles for topic-link from source
* @Author: Chiliec
* @Author URI: http://livestreet.net
* @License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
* -------------------------------------------------------------------------------------
*/
class PluginTitles_ModuleTopic_EntityTopic extends PluginTitles_Inherit_ModuleTopic_EntityTopic {
	public function getLinkTitle() {
		if ($this->getType()!='link') {
			return null;
		}		
		$sUrl=$this->getExtraValue('url');
		if (!preg_match("/^https?:\/\/(.*)$/i",$sUrl,$aMatch)) {
			$sUrl='http://'.$sUrl;
		}
		if (false === ($title = $this->Cache_Get("link_title_{$sUrl}"))) {
			$content = @file_get_contents($sUrl);
		  	if($content == true) {
				preg_match('/<title>(.*)<\/title>/s', $content, $m);
				$title = $m[1];
			} else {
				$title = $this->Lang_Get('plugin.titles.titles_read_more');
			}
			$this->Cache_Set($title, "link_title_{$sUrl}", array(), 60*60*24);
		}
		return $title;
	}
}
?>