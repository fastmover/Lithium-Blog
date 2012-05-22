<?php

	namespace app\controllers;
	
	use app\models\Posts;
	
	class PostsController extends \lithium\action\Controller {
		
		public function index() {
			//return array('foo' => 'bar', 'title' => 'Posts');
			$posts = Posts::all();
			return compact('posts');
		}
		public function add() {
			$success = false;

			if ($this->request->data) {
				$post = Posts::create($this->request->data);
				$success = $post->save();
			}
			return compact('success');
		}
		public function view($id=null) {
			// we are going to view a page.
			if(!is_null($id)) {
				//$id = new MongoId($id);
				$post = Posts::find('first', array('_id'=>$id));
				//print_r($id);
				return compact('post');
			}
			$post = array('title'=>'404','body'=>'404 Not Found!');
			return compact('post');
		}
	}

?>