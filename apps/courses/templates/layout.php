<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/css/courses.css" />
    <script type='text/javascript' src='/js/popupMenu.js'></script>
  </head>
  <body>
  	<div id='wrapper'>
	  	<?php echo searchBar::get(); ?>
		<?php echo $sf_content ?>
	</div>
  </body>
</html>
