<?php

	namespace app\models;

	class Posts extends \lithium\data\Model {
		protected $_schema = array(
			'_id' => array('type' => 'id'),
			'user_id' => array('type' => 'string'),
			'account_id' => array('type' => 'string'),
			'hash' => array('type' => 'string'),
			
			'date' => array('type' => 'date'),
			'published' => array('type' => 'string'),
			
			'title' => array('type' => 'string'),
			'description' => array('type' => 'string'),
			'body' => array('type' => 'string'),
			
			'meta' => array('type' => 'object'),
			'meta.title' => array('type' => 'string'), 
			'meta.description' => array('type' => 'string'), 
			'meta.keywords' => array('type' => 'string'), 
			'meta.category_ids' => array('type' => 'string', 'array' => true),
			'meta.tags' => array('type' => 'string', 'array' => true),
			'meta.note' => array('type' => 'string')
		);
	}

?>