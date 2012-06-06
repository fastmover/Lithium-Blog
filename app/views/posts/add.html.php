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
					<?= $this->_render("element", "wysihtml5menu", array("var1" => "crapohla" )) ?>
					<?=$this->form->field( 
						'body', 
						array( 
							'type' => 'textarea',
							'id' => "wysihtml5-textarea" ,
							'placeholder' => "Enter your text ..." ,
							'autofocus' => null
						) 
					);?>
					<?=$this->form->field( 
						'tags', 
						array( 
							'type' => 'array', 
							'value' => '', 
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
							'value' => '', 
							'class' => 'tags'
						) );?>
					</div>
				</div>
				<div class="span5">
					<?=$this->form->submit( 
						'Add Post',
						array(
							'class' => 'buttonz'
						)
					); ?>
				</div>
			</div>
			
		<?=$this->form->end(); ?>
	</div>
</div>
<?php echo $this->html->script( array( 'jquery.collapsible.min.js', 'jquery.tagsinput.min.js', 'advanced.js', 'wysihtml5-0.3.0.min.js' ) ); ?>
<script type="text/javascript">
$( document ).ready( function() {
	//collapsible management
	$( '.collapsible' ).collapsible({
		defaultOpen: 'nav-section1,nav-section3'
	});
	//collapsible management
    $('.collapsible').collapsible({
      defaultOpen: 'nav-section1,nav-section3'
    });
	//Dynamic Blog Title
	$(".BlogTitle").keyup(function() {
		var title = $(".BlogTitle").val()
		$("h3.blogTitle").html(
			'<h3 class="collapsible blogTitle" id="nav-section3">' +
			title +
			'<span></span><h3>'
		);
		blogTitle.value = this.value;
	});
	//Tags
	$('.tags').tagsInput({width:'auto'});
	//Wysihtml5
	var editor = new wysihtml5.Editor("wysihtml5-textarea", { // id of textarea element
		toolbar:      "wysihtml5-toolbar", // id of toolbar element
		parserRules:  wysihtml5ParserRules // defined in parser rules set 
	});
	
} );
</script>