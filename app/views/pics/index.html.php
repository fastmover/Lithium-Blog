
<?php if ( !count( $pics ) ): ?>
	<em>No Images</em>
	<?=$this->html->link( 'Add Image', 'Pics::add' ); ?>
<?php endif ?>
<ul class="indexImages">
<?php foreach( $pics as $pic ): ?>
<?php

$imgFP = array(	'Pics::view', 'id' => $pic->_id, 'type' => 'jpg' );
$img = $this->html->image( $imgFP );

?>
	<li>
		<?=$this->html->link(
			$img,
			array(
				'Pics::view',
				'id' => $pic->_id
			),
			array( 'escape' => false )
		); ?>
	</li>
<?php endforeach ?>
</ul>