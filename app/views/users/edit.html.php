<?php if( isset( $updated ) && $updated == true):?>
	<div><p class="alert alert-success">Successfully updated</p></div>
<?php endif; ?>
<?php if( isset( $error ) && $error == true):?>
	<div><p class="alert alert-warning">Error Updating Record.</p></div>
<?php endif; ?>
<?php if( !isset( $user ) || $user == null):?>
	<div><p class="alert alert-error">Error User Not Found.</p></div>
<?php endif; ?>
<?=$this->form->create(null); ?>
    <?=$this->form->hidden('id', array( 'value' => $user->_id ) ); ?>
	<?=$this->form->field('username', array( 'label' => 'Username', 'value' => $user->username ) ); ?>
	<?=$this->form->field('access_level', array( 'type' => 'integer', 'label' => 'Access Level', 'value' => $user->access_level, 'id' => 'access') ); ?>
	<div id="slider-range"></div>
	<?=$this->form->field('email', array( 'label' => 'Email', 'value' => $user->email ) ); ?>
	<?=$this->form->field('fName', array( 'label' => 'First Name', 'value' => $user->fName ) ); ?>
	<?=$this->form->field('lName', array( 'label' => 'Last Name', 'value' => $user->lName ) ); ?>
	<span>
		Publicize your real name?
	</span>
	<?php /*=$this->form->field('publicName', array( 
		'label' => '', 
		'value' => $user->profile->publicName, 
		'type' => 'checkbox' 
	) );*/ ?>
	<?=$this->form->checkbox( 
		'publicName', 
		array( 'checked' => $user->profile->publicName ) 
	); ?>
	<?=$this->form->field('twitter', array( 'label' => 'Twitter', 'value' => $user->profile->twitter ) ); ?>
	<?=$this->form->field('gplus', array( 'label' => 'Google +', 'value' => $user->profile->gplus ) ); ?>
	<?=$this->form->field('facebook', array( 'label' => 'Facebook', 'value' => $user->profile->facebook ) ); ?>
	<?=$this->form->field('github', array( 'label' => 'GitHub', 'value' => $user->profile->github ) ); ?>

    <?=$this->form->submit('Update'); ?>
<?=$this->form->end(); ?>


<script type="text/javascript">
$(function() {
		$( "#slider-range" ).slider({
			range: "min",
			value: <?=$user->access_level;?>,
			min: 1,
			max: 99,
			slide: function( event, ui ) {
				$( "#access" ).val( ui.value );
			}
		});
		$( "#access" ).val( $( "#slider-range" ).slider( "value" ) );
	});
</script>