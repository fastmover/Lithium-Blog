<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright	 Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license	   http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Application > <?php echo $this->title(); ?></title>
	
	<?php 
		echo $this->html->style( array( 
			'debug',
			
			'jquery-ui-1.8.20.custom',
			'bootstrap-wysihtml5',
			
			'bootstrap.min',
			'wysihtml5upload/style',
			'http://blueimp.github.com/cdn/css/bootstrap-responsive.min.css',
			'wysihtml5upload/bootstrap-image-gallery.min',
			'wysihtml5upload/jquery.fileupload-ui',
			'app'
			
		) ); 
		//echo $this->html->style(array('debug', 'lithium', 'bootstrap')); 
	?>

	<?php echo $this->html->link('Icon', null, array( 'type' => 'icon') ); ?>
	
</head>
<body class="app">

<?= $this->_render("element", "menu", array("asdf" => "base" )) ?>

	<div class="container">
		<div id="margintopforty">
			<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div class="span4">
						<h1></h1>
					</div>
					<div class="span4">
						<h2>Powered by <?php echo $this->html->link('Lithium', 'http://lithify.me/'); ?>.</h2>
					</div>
					<div class="span4">
						
					</div>
				</div>
			</div>
			</div>
			<?php echo $this->content(); ?>
		</div>
	</div>
	<script type="text/javascript">
		$('.dropdown-toggle').dropdown();
	</script>
</body>
</html>