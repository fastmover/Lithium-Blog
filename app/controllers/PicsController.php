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
	public function ajaxUpload() {
		$pic = Pics::create();

		if ( ( $this->request->data ) && $pic->save( $this->request->data ) ) {
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