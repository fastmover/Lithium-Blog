<?php if ( !count( $pics ) ): ?>
	<em>No Images</em>
	<?=$this->html->link( 'Add Image', 'Pics::add' ); ?>
<?php endif ?>
<ul>
<?php foreach( $pics as $pic ): ?>
	<li>
		<?=$this->html->link(
			$pic->title,
			array(
				'Pics::view',
				'id' => $pic->_id
			)
		); ?>
	</li>
<?php endforeach ?>
</ul>