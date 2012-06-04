<div class="container">
	<div id="margintopforty">
		<?php if ( $success ): ?>
			<p class="alert alert-success">Post Successfully Edited</p>
		<?php endif; ?>
		<?=$this->form->create($post); ?>
		
			<div class="row">
				<div class="span7">
					<h3 class="collapsible blogTitle" id="nav-section3">Post<span></span><h3>
					<div>
					<?=$this->form->field( 'title', array( 'class' => 'span7 BlogTitle' ) );?>
					<?=$this->form->field( 'body', array( 'type' => 'textarea', 'class' => 'span7' ) );?>
					</div>
					<h3 class="collapsible blogTitle" id="nav-section3">Tags<span></span><h3>
					<div>
					<?=$this->form->field( 
						'tags', 
						array( 
							'type' => 'array', 
							'value' => $this->Tags->tagsToString( $post->tags ), 
							'class' => 'tags'
						) 
					);?>
					</div>
					<h3 class="collapsible" id="nav-section3">Meta Data<span></span><h3>
					<div>
					<?=$this->form->field( 'meta.title', array( 'type' => 'string' ) );?>
					<?=$this->form->field( 'meta.description', array( 'type' => 'textarea' ) );?>
					<?=$this->form->field( 
						'meta.keywords', 
						array( 
							'type' => 'array', 
							'value' => $this->Tags->tagsToString( $post->meta->keywords ), 
							'class' => 'tags'
						) );?>
					</div>
				</div>
				<div class="span5">
					<?=$this->form->submit( 'Update Post' ); ?>
				</div>
			</div>
			
		<?=$this->form->end(); ?>
	</div>
</div>
<?php echo $this->html->script( array( 'jquery.collapsible.min.js', 'jquery.tagsinput.min.js' ) ); ?>
<script type="text/javascript">
  $(document).ready(function() {
    //collapsible management
    $('.collapsible').collapsible({
      defaultOpen: 'nav-section1,nav-section3'
    });
	$(".BlogTitle").keyup(function() {
		var title = $(".BlogTitle").val()
		$("h3.blogTitle").html(
			'<h3 class="collapsible blogTitle" id="nav-section3">' +
			title +
			'<span></span><h3>'
		);
		blogTitle.value = this.value;
	});
	$('.tags').tagsInput({width:'auto'});
  });
</script>