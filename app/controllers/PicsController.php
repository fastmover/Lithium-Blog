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