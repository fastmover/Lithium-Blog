<h1><?=$pic->title; ?></h1>
<p><?=$pic->description; ?></p>
<p>
	<?=$this->html->link( 'Edit', array( 'Pics::edit', 'id' => $pic->_id ) ); ?>
</p>

<?=$this->html->image( "/pics/view/{$pic->_id}.jpg", array(
	'alt' => $pic->title,
	'width' => 500
)); ?>