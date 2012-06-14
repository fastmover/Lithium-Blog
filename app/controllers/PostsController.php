<?php

	namespace app\controllers;
	
	use app\models\Posts;
	
	class PostsController extends \lithium\action\Controller {
		
		public function index() {
		
			//return array('foo' => 'bar', 'title' => 'Posts');
			$posts = Posts::all();
			return compact('posts');
			
		}
		public function trimExplode($array) {
			if($array){
				return array_map(
					"trim", 
					explode(
						",", 
						$array
					) 
				);
			} else {
				return null;
			}
		}
		public function add() {		
			$success = false;

			if ($this->request->data) {
				$this->request->data['meta']['keywords'] = $this->trimExplode($this->request->data['meta']['keywords']);
				$this->request->data['tags'] = $this->trimExplode($this->request->data['tags']);
				$post = Posts::create($this->request->data);
				$success = $post->save();
				
			}
			$this->_render['layout'] = 'default';
			//$this->_render['layout'] = 'wysiwyg';
			return compact('success');
		}
		/*
		Tags
		*/
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
		public function searchTags() {
		$posts = null;
		//$posts = Posts::all
		if( isset( $this->request->args ) ) {
				
			$posts = Posts::find('all', array(
					'conditions' => array( 'tags' => $this->request->args )
				)
			);
			
		}
		$this->_render['template'] = 'index';
		return compact('posts');
	}
		public function view() {
		
			if(!$this->request->params['id']){
			
				return $this->redirect('/posts/');
				
			}
			if($this->request->params['id']) {
			
				//$id = new MongoId($id);
				$post = Posts::first( $this->request->params['id'] );
				//print_r($id);
				return compact('post');
				
			}
			$post = array('title'=>'404','body'=>'404 Not Found!');
			return compact('post');
			
		}
		public function edit() {
		
			if(!$this->request->params['id']){
			
				return $this->redirect('/posts/');
				
			}
			$success = false;
			$error = false;
			if ($this->request->data) {
				
				//Validate data here
				if(Posts::update( array( 
						'user_id' => $this->request->data['user_id'],
						'date' => $this->request->data['date'],
						'published' => $this->request->data['published'],
						'deleted' => $this->request->data['deleted'],
						'title' => $this->request->data['title'],
						'body' => $this->request->data['body'],
						'tags' => $this->trimExplode( $this->request->data['tags'] ),
						'category_ids' => $this->request->data['category_ids'],
						'meta.title' => $this->request->data['meta']['title'],
						'meta.description' => $this->request->data['meta']['description'],
						'meta.keywords' => $this->trimExplode( $this->request->data['meta']['keywords'] )
						
					),
					array( 
						'_id' => $this->request->data['id'] ) 
					)
				) {
				
					$updated = true;
					
				} else {
				
					$updated = false;
					
				}
				// */
			}
			$post = Posts::first( $this->request->params['id'] );
			return compact('post', 'success', 'error');
		}
		
	}

?>