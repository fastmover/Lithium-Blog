<?php if( isset( $updated ) && $updated == true):?>
	Successfully updated
<?php else: ?>
<?=$this->form->create(null); ?>
    <?=$this->form->hidden('id', array( 'value' => $user->_id ) ); ?>
	<?=$this->form->field('username', array( 'label' => 'Username', 'value' => $user->username ) ); ?>
    <?=$this->form->field('password', array('type' => 'password')); ?>
    <?=$this->form->submit('Update'); ?>
<?=$this->form->end(); ?>
<?php endif; ?>