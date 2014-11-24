<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Change password</title>
</head>
<body>
	<form action="<?=BASE_URL?>/processRequest.php" method="post">
		<input name="requestClass" value="SavePassword" type="hidden">
		<table style="background-color: rgb(51, 102, 255);" align="center">
			<tbody>
				<tr>
					<td>Old password:</td>
					<td><input name="oldpassword" type="password"></td>
				</tr>
				<tr>
					<td>New Password:</td>
					<td><input name="newpassword" type="password"></td>
				</tr>
				<tr>
					<td>Confirm new Password:</td>
					<td><input name="confirmpassword" type="password"></td>
				</tr>
				<tr>
					<td style="text-align: center;" colspan="2"><input value="OK"
						type="submit"></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html>
