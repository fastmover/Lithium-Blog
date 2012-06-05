<?=$this->form->create( $pic, array( 'type' => 'file' ) ); ?>
	<?=$this->form->field( 'title' ); ?>
	<?=$this->form->field( 'description' ); ?>
	<?php if( !$pic->exists() ) { ?>
		<?=$this->form->field( 'file', array( 'type' => 'file' ) ); ?>
	<?php } ?>
	<?=$this->form->submit( 'Save' ); ?>
<?=$this->form->end(); ?>