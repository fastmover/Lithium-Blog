<?php

namespace app\controllers;

use app\models\Posts;

class TagsController extends \lithium\action\Controller {

	public function tagsIndex() {
		$result = Posts::all(array(
			'fields' => array('tags')
		));
		//$tags = array();  //this is created by assignment $arr[] = $tag
		foreach($result as $doc) {
			if(isset($doc->tags[0]) && !empty($doc->tags[0])) {
				foreach($doc->tags as $tag) {
					$tags[] = $tag;
				}
			}
		}
		return compact('tags');
	}
	
	public function view() {
		$tag = Tags::first($this->request->id);
		return compact('tag');
	}

	public function add() {
		$tag = Tags::create();

		if (($this->request->data) && $tag->save($this->request->data)) {
			$this->redirect(array('Tags::view', 'args' => array($tag->id)));
		}
		return compact('tag');
	}

	public function edit() {
		$tag = Tags::find($this->request->id);

		if (!$tag) {
			$this->redirect('Tags::index');
		}
		if (($this->request->data) && $tag->save($this->request->data)) {
			$this->redirect(array('Tags::view', 'args' => array($tag->id)));
		}
		return compact('tag');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Tags::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		Tags::find($this->request->id)->delete();
		$this->redirect('Tags::index');
	}
}

?>