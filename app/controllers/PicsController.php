<?php

namespace app\controllers;

use app\models\Pics;

class PicsController extends \lithium\action\Controller {

	public function index() {
		$pics = Pics::all();
		return compact( 'pics' );
	}

	public function view() {
		$pic = Pics::first( $this->request->id );
		return compact( 'pic' );
	}

	public function add() {
		$pic = Pics::create();

		if ( ( $this->request->data ) && $pic->save( $this->request->data ) ) {
			$this->redirect( array( 'Pics::view', 'id' => $pic->_id ) );
		}
		$this->_render['template'] = 'edit';
		return compact('pic');
	}
	private function filterAjax($arr) {
		$arr = $arr['files'][0];
		//unset( $arr->files );
		/*return array_intersect_key(
			$arr,
			array(
				'_id' => true,
				'name' => true,
				'size' => true,
				'url' => true,
				'thumbnail_url' => true,
				'delete_url' => true,
				'delete_type' => true
			)
		);*/
		/*
		unset(
			$arr['title'],
			$arr['body'],
			$arr['_wysihtml5_mode'],
			$arr['tags'],
			$arr['meta']
		);
		//*/
		return $arr;
	}
	private function assocFiles($arr){
		return null;
	}
	public function ajaxUpload() {
		$pic = Pics::create();

		if ( $this->request->data )  {
			$pic = Pics::create();
			
			/*
			$dataf = $this->filterAjax( $this->request->data );
			echo ":::";
			var_dump( $dataf );
			echo ":::";
			var_dump( $this->request->data );
			$this->request->data = $dataf;
			*/
			
			/*
			$pic->save( 
				$this->filterAjax(
					$this->request->data 
				) 
			)
			// */
			unset(
				$this->request->data['title'],
				$this->request->data['body'],
				$this->request->data['_wysihtml5_mode'],
				$this->request->data['tags'],
				$this->request->data['meta']
			);
			/*var_dump( $this->request->data );*/
			if( $pic->save( $this->request->data ) ) {
			
				//$this->redirect( array( 'Pics::view', 'id' => $pic->_id ) );
				$this->_render['template'] = 'ajaxUpload';
				/*
				$picc = json_decode(
					'[
						{
							"name":' . $pic->filename . ',
							"size":"' . $pic->size . '",
							"url":"/pics/view/' . $pic->_id . '.jpg",
							"thumbnail_url":"/pics/view/' . $pic->_id . '.jpg",
							"delete_url":"/pics/delete/' . $pic->_id . '.jpg}",
							"delete_type":"DELETE"
						}
					]'
				);
				$picc = array( 0 => array(
					"name" => $pic->file->name,
					"size" => $pic->file->size,
					"url" => "/pics/view/" . $pic->_id . ".jpg",
					"thumbnail_url" => "/pics/view/" . $pic->_id . ".jpg",
					"delete_url" => "/pics/delete/" . $pic->_id,
					"delete_type" => "DELETE"
					
				));
				
				$name = $pic->file->name;
				$size = $pic->file->size;
				$url = "/pics/view/" . $picurl . ".jpg";
				$thumbnail_url = "/pics/view/" . $pic->_id . ".jpg";
				$delete_url = "/pics/delete/" . $pic->_id;
				$delete_type = "DELETE";
				*/
				
				
				
				return compact( 'pic' );
				//print_r($picc);
				//return $this->render(array('json' => $pic, 'status'=> 200));
				
				//return $this->render(array('json' => $picc, 'status'=> 200));
				//return compact( 'name', 'size', 'url', 'thumbnail_url', 'delete_url', 'delete_type' );
			}
			//$url = Request->_base;
		}
	

		
		
		//print_r(Request::_base());
		//$this->_render['template'] = 'ajaxUpload';
		$picc = json_decode(
				'[
					{
						"name":' . $pic->filename . ',
						"size":"' . $pic->size . '",
						"url":"/pics/view/' . $pic->_id . '.jpg",
						"thumbnail_url":"/pics/view/' . $pic->_id . '.jpg",
						"delete_url":"/pics/delete/' . $pic->_id . '.jpg}",
						"delete_type":"DELETE"
					}
				]'
			);
		$picc = array();
		return $this->render(array('json' => $data = $picc, 'status'=> 200));
		//return compact('picc');
	}
	public function edit() {
		$pic = Pics::find( $this->request->id );

		if (!$pic) {
			$this->redirect( 'Pics::index' );
		}
		if ( ( $this->request->data ) && $pic->save( $this->request->data ) ) {
			$this->redirect( array( 'Pics::view', 'args' => array( $pic['_id'] ) ) );
		}
		return compact( 'pic' );
	}

	public function delete() {
		if ( !$this->request->is( 'post' ) && !$this->request->is( 'delete' ) ) {
			$msg = "Pics::delete can only be called with http:post or http:delete.";
			throw new DispatchException( $msg );
		}
		Pics::find($this->request->id)->delete();
		$this->redirect( 'Pics::index' );
	}
}

?>