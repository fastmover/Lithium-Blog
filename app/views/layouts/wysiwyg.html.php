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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<?php 
		echo $this->html->style( array( 
			'debug', 
			'bootstrap.min', 
			'app', 
			'jquery-ui-1.8.20.custom', 
			'bootstrap-wysihtml5' 
		) ); 
		//echo $this->html->style(array('debug', 'lithium', 'bootstrap')); 
	?>
	<?php echo $this->html->script( array( 
		'jquery-ui-1.8.20.custom.min', 
		'bootstrap.min' 
	) ); ?>
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
						<h1>Blog</h1>
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