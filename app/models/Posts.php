<?php

	namespace app\models;

	class Posts extends \lithium\data\Model {
		protected $_schema = array(
			'_id' => array('type' => 'id'),
			'user_id' => array('type' => 'string'),
			
			'date' => array('type' => 'date'),
			'date_first_saved' => array('type' => 'date'),
			'published' => array('type' => 'boolean'),
			'deleted' => array('type' => 'boolean'),
			
			'title' => array('type' => 'string'),
			'body' => array('type' => 'string'),
			'tags' => array('type' => 'string', 'array' => true),
			'category_ids' => array('type' => 'string', 'array' => true),
			
			'meta' => array('type' => 'object'),
			'meta.title' => array('type' => 'string'), 
			'meta.description' => array('type' => 'string'), 
			'meta.keywords' => array('type' => 'string')
		);
		public $validates = array(
			'username' => array(
				array(
					'notEmpty',
					'required' => true,
					'message' => 'Please supply a username.'
				),
				array(
					'alphaNumeric',
					'message' => 'A username may only contain letters and numbers.'
				)
			),
			'password' => array(
				array(
					'notEmpty',
					'required' => true,
					'message' => 'Please supply a password.'
				)
			),
			'date' => array(
				array(
					'blank'
				)
			)
		);
		public $date;
		public $published;
		public $deleted;
		public $category_ids;
		public $id;
	}

?>