<div class="container">
	<div id="margintopforty">
		<?php if ( $success ): ?>
			<p class="alert alert-success">Post Successfully Posted</p>
		<?php endif; ?>
		<?=$this->form->create(); ?>
		
			<div class="row row-fluid">
				<div class="span7">
					<h3 class="collapsible" id="nav-section3">Post<span></span><h3>
					<div>
					<?=$this->form->field( 'title' );?>
					<?=$this->form->field( 'body', array( 'type' => 'textarea' ) );?>
					<?=$this->form->field( 'tags' );?>
					</div>
					<h3 class="collapsible" id="nav-section3">Meta Data<span></span><h3>
					<div>
					<?=$this->form->field( 'meta.title', array( 'type' => 'string' ) );?>
					<?=$this->form->field( 'meta.description', array( 'type' => 'textarea' ) );?>
					<?=$this->form->field( 'meta.keywords', array( 'type' => 'string' ) );?>
					</div>
				</div>
				<div class="span5">
					<?=$this->form->submit( 'Add Post'); ?>
				</div>
			</div>
			
		<?=$this->form->end(); ?>
	</div>
</div>
<?php echo $this->html->script( 'jquery.collapsible.min.js'); ?>
<script type="text/javascript">
$( document ).ready( function() {
	//collapsible management
	$( '.collapsible' ).collapsible({
		defaultOpen: 'nav-section1,nav-section3'
	});
} );
</script>