<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>Open Blog update to 1.2.1</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="includes/style/main.css" media="screen"/>
</head>
<body>
<div class="container">
	<div class="header"> 
		<?php include('pages/update/header.php'); ?>
	</div>
		
	<div class="top">
		<?php
			require('includes/functions_common.php');
			require('includes/functions_update.php');
	
			$step = (int)$_GET['step'];
			
			switch ($step)
			{
				case 1:
				{
					$title = 'Step 1 / 2';
					$file = 'pages/update/step_1.php';
					break;
				}
				
				case 2:
				{
					$title = 'Step 2 / 2';
					$file = 'pages/update/step_2.php';
					break;
				}
				
				default :
				{
					$title = 'Open Blog update process';
					$file = 'pages/update/index.php';
				}
			}
		?>
   		<?php echo $title; ?>
    </div>
	
	<div class="main">
			<?php include($file); ?>
	</div>
	
	<div class="footer">
    	<?php include('pages/update/footer.php'); ?>
    </div>
</div>
</body>
</html>
<?php ob_start(); ?>
