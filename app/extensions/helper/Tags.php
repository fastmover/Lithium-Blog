<?php

namespace app\extensions\helper;

use lithium\security\Auth;

class Tags extends \lithium\template\Helper {
	public function tags($tags) {
		$html = "";
		foreach( $tags as $tag ){
			
			$html .= "<li>" . $tag . "</li>";
			
		}
		return $html;
	}
	public function keywords($keywords) {
		return $this->tags($keywords);
	}
	public function tagsToString($tags) {
		//is_string( $tags ) == true ?: return $tags;
		//	is_array( $tags ) == false ?: return $html;
		$html = "";
		$count = 0;
		foreach( $tags as $tag ){
			if( $count==0 ){
				$count++;
				$html = $tag;
				continue;
			}
			$html .= "," . trim( $tag );
			
		}
		return $html;
	}
}
?>