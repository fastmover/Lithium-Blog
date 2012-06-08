<div class="container-fluid">
	<div id="margintopforty">
		<?php if ( $success ): ?>
			<p class="alert alert-success">Post Successfully Posted</p>
		<?php endif; ?>
		<?=$this->form->create( null, array( 'id' => 'fileupload' ) ); ?>
		
			<div class="row-fluid">
				<div class="span12">
					<h3 class="collapsible" id="nav-section3">Post<span></span><h3>
					<div>
					<?=$this->form->field( 'title' );?>
					<?php /*$this->_render("element", "wysihtml5menu", array("var1" => "crapohla" ))*/ ?>
					<?=$this->form->field( 
						'body', 
						array( 
							'type' => 'textarea',
							'id' => "wysihtml5-textarea" ,
							'placeholder' => "Enter your text ..." ,
							'autofocus' => null,
							'rows' => '12',
							'width' => '100%',
							'class' => 'span12 fluidtextarea'
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
					<br />
					<?=$this->form->submit( 
						'Add Post',
						array(
							'class' => 'btn btn-inverse'
						)
					); ?>
				</div>
				<?php
				/*
				<div class="span5">
					<?=$this->form->submit( 
						'Add Post',
						array(
							'class' => 'buttonz'
						)
					); ?>
				</div>
				*/
				?>
			</div>
			<br />


 <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="span7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add files...</span>
                    <input type="file" name="file" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="icon-trash icon-white"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">
            </div>
            <!-- The global progress information -->
            <div class="span5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The loading indicator is shown during file processing -->
        <div class="fileupload-loading"></div>
        <br>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
		
		
		
			
			
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">
        <a class="btn modal-download" target="_blank">
            <i class="icon-download"></i>
            <span>Download</span>
        </a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
            <i class="icon-play icon-white"></i>
            <span>Slideshow</span>
        </a>
        <a class="btn btn-info modal-prev">
            <i class="icon-arrow-left icon-white"></i>
            <span>Previous</span>
        </a>
        <a class="btn btn-primary modal-next">
            <span>Next</span>
            <i class="icon-arrow-right icon-white"></i>
        </a>
    </div>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>{%=locale.fileupload.start%}</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
		<td class="insert">
            <a class="btn btn-primary" data-wysihtml5-command="insertImage" data-wysihtml5-command-value="{%=file.url%}" >
                <i class="icon-file icon-white"></i>
                <span>Insert</span>
            </a>
        </td>
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>{%=locale.fileupload.destroy%}</span>
            </button>
            <input type="checkbox" name="delete" value="1">
        </td>
    </tr>
{% } %}
</script>



			
			
		
			
			
			
			
			
		<?=$this->form->end(); ?>
	





	
	</div>
</div>


<?php echo $this->html->script( array(
	/*'jquery.min',*/
	'jquery-1.7.2',
	
	'wysihtml5upload/jquery.ui.widget',
	'http://blueimp.github.com/JavaScript-Templates/tmpl.min.js',
	'http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js',
	'http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js',
	'http://blueimp.github.com/cdn/js/bootstrap.min.js',

	'jquery-ui-1.8.20.custom.min', 

	
	'bootstrap.min',
	/*
	'jquery.tagsinput.min', 
	*/
	'advanced', 

	'wysihtml5-0.3.0.min', 

	'bootstrap-wysihtml5', 
	
	'wysihtml5upload/bootstrap-image-gallery.min',
	'wysihtml5upload/jquery.iframe-transport',
	'wysihtml5upload/jquery.fileupload',
	'wysihtml5upload/jquery.fileupload-fp', 
	'wysihtml5upload/jquery.fileupload-ui',
	'wysihtml5upload/locale',
	/*'wysihtml5upload/main2'*/
	/*'jquery.collapsible.min', */
) ); ?>

<?php 
/*
<script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
*/
?>


<script type="text/javascript">

/*
$( document ).ready( function() {
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
	
	
	/* wysihtml5 image upload */

	// Initialize the jQuery File Upload widget:
	//$('#fileupload').fileupload();
	/*
	$('#fileupload').fileupload( {
		url: 'http://localhost/github/Lithium-Blog/pics/ajaxUpload.json',
		sequentialUploads: true,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
        },
		drop: function (e, data) {
			$.each(data.files, function (index, file) {
				alert('Dropped file: ' + file.name);
			});
			//data.submit();
		},
		add: function (e, data) {
			$(this).fileupload('process', data).done(function () {
				data.submit();
			});
		}
    });
	
	
	/*
	
	
	$('#fileupload').fileupload( {
		url: 'http://localhost/github/Lithium-Blog/pics/ajaxUpload.json',
		sequentialUploads: true,
        dataType: 'json'
	});
	// */
	
	
	/*
	
} );

*/



$(function () {
	'use strict';

	// Initialize the jQuery File Upload widget:
	$('#fileupload').fileupload( { url: 'http://localhost/github/Lithium-Blog/pics/ajaxUpload.json', dataType: 'json' } );

	// Enable iframe cross-domain access via redirect option:
	$('#fileupload').fileupload(
		'option',
		'redirect',
		window.location.href.replace(
			/\/[^\/]*$/,
			'/cors/result.html?%s'
		)
	);
	/*
	// Load existing files:
	$('#fileupload').each(function () {
		var that = this;
		$.getJSON(this.action, function (result) {
			if (result && result.length) {
				$(that).fileupload('option', 'done')
					.call(that, null, {result: result});
			}
		});
	});
	// */
	//Wysihtml5
	$('#wysihtml5-textarea').wysihtml5({
		"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
		"emphasis": true, //Italics, bold, etc. Default true
		"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
		"html": false, //Button which allows you to edit the generated HTML. Default false
		"link": true, //Button to insert a link. Default true
		"image": true //Button to insert an image. Default true
	});
	/*
	var editor = new wysihtml5.Editor("wysihtml5-textarea", { // id of textarea element
		toolbar:	  "wysihtml5-toolbar", // id of toolbar element
		parserRules:  wysihtml5ParserRules // defined in parser rules set 
	});
	*/
});
// */
</script>