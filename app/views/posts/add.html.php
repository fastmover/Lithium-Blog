<div class="container">
	<div id="margintopforty">
		<?php if ($success): ?>
			<p>Post Successfully Saved</p>
		<?php endif; ?>
		<?=$this->form->create(); ?>
		
			<div class="row">
				<div class="span7">
					<?=$this->form->field('title');?>
					<?=$this->form->field('body', array('type' => 'textarea'));?>
					<?=$this->form->field('description', array('type' => 'textarea'));?>
					<?=$this->form->field('meta.keywords', array('type' => 'string'));?>
				</div>
				<div class="span5">
					<?=$this->form->submit('Add Post'); ?>
				</div>
			</div>
			
		<?=$this->form->end(); ?>
	</div>
</div>