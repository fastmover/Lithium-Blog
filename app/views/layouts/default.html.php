<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Application > <?php echo $this->title(); ?></title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<?php 
		echo $this->html->style(array('debug', 'bootstrap.min', 'app', 'jquery-ui-1.8.20.custom')); 
		//echo $this->html->style(array('debug', 'lithium', 'bootstrap')); 
	?>
	<?php echo $this->html->script('bootstrap.min'); ?>
	<?php echo $this->html->script('jquery-ui-1.8.20.custom.min'); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
	
</head>
<body class="app">
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">Project name</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li class="nav-header">Nav header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-search pull-left" action="">
					<input type="text" class="search-query span2" placeholder="Search">
				</form>
				<ul class="nav pull-right">
					<li><a href="#">Link</a></li>
					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.nav-collapse -->
		</div>
	</div><!-- /navbar-inner -->
</div>
	<div class="container">
		<div id="margintopforty">
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
			<?php echo $this->content(); ?>
		</div>
	</div>
	<script type="text/javascript">
		$('.dropdown-toggle').dropdown();
	</script>
</body>
</html>