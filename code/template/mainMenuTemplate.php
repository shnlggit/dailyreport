<html>
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>Main menu</title>
</head>
<body>
	<?php $this->buildUserPanel();?>
	<a href="<?php echo BASE_URL?>/processRequest.php?type=menuReportInput">create
		new report</a>
	<br>
	<a href="<?=BASE_URL?>/processRequest.php?type=menuReportList">reports
		list</a>
	<br>
</body>
</html>
