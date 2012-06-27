<?php
$imgFP = array( 'Pics::edit', 'id' => $pic->_id, 'type' => 'jpg' );
$img = $this->html->image(
			$imgFP, 
			array(
				'alt' => $pic->title,
				'width' => 500
			)
		);

?>
<h1><?=$pic->title; ?></h1>
<p><?=$pic->description; ?></p>
<p>
	<?=$this->html->link( 'Edit', array( 'Pics::edit', 'id' => $pic->_id ) ); ?>
</p>

<?=$this->html->link(
		$img,
		$imgFP,
		array( 'escape' => false )
	); ?>