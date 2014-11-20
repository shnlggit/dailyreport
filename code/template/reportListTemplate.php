<html>
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>Report list</title>
</head>
<body>
	<?php $this->buildUserPanel();?>
	<a href="<?=BASE_URL?>">Back to main menu</a>
	<a href="<?php echo BASE_URL?>/processRequest.php?type=EditReport">create
		new report</a>
	<br>
	<table style="text-align: left;" border="1" cellpadding="2"
		cellspacing="2">
		<tbody>
			<?php $this->buildCols();?>
		</tbody>
	</table>
</body>
</html>
