<!DOCTYPE html>
<html>
	<head>
		<title>Ask-Programer</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<p>Hello,</p>
		<p>Bạn vừa yêu cầu <strong>Ask-Programer</strong> khôi phục mật khẩu của mình.</p>
		<p>Xin vui lòng nhấn vào liên kết bên dưới để tiến hành khôi phục:</p>
		<p><a href="{{ $link = url('/password/reset', $token) . '?email=' . urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a></p>
		<p>--</p>
		<p>&copy; 2017 Ask-Programer</p>
	</body>
</html>