<html>
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>Daily report</title>
</head>
<body>
	<?php $this->buildUserPanel();?>
	<a href="<?=BASE_URL?>/processRequest.php?type=ReportList">reports list</a>
	<br>
	<form action="<?=BASE_URL?>/processRequest.php" method="post">
		<input name="requestClass" value="SaveReport" type="hidden"> <input
			name="name" value="<?php echo UserManager::getUser()->getName();?>"
			type="hidden">
		<table style="text-align: left;" border="1" cellpadding="2"
			cellspacing="2">
			<tbody>
				<tr>
					<td>Date</td>
					<td><input value="2014" maxlength="4" size="4" name="year">/<input
						value="11" maxlength="2" size="2" name="month">/<input value="11"
						maxlength="2" size="2" name="day"></td>
				</tr>
				<tr>
					<td>Content</td>
					<td><textarea cols="40" rows="5" name="content"></textarea></td>
				</tr>
				<tr>
					<td style="text-align: center;" colspan="2"><input value="OK"
						type="submit"></td>
				</tr>
			</tbody>
		</table>
	</form>
	<br>
</body>
</html>
